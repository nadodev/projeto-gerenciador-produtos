<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\ProductHistory;
use App\Models\ProductMovement;
use App\Exports\ProductsExport;
use App\Repositories\Products\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function __construct(protected ProductRepository $productRepository)
    {}

    public function index(Request $request)
{
    try {
        $categoryId = $request->input('category_id');
        $sortColumn = $request->input('sort', 'id');



        $query = $this->productRepository->getAll()->where('active', 'active');

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        switch ($sortColumn) {
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'price':
                $query->orderBy('price', 'desc');
                break;
            case 'stock':
                $query->orderBy('stock', 'desc');
                break;
            default:
                $query->orderBy('id', 'asc');
                break;
        }

        $products = $query->paginate(10);
        $categories = Category::has('products')->get();

        return view('dashboard.products.index', compact('products', 'categories'));
    } catch (\Exception $e) {
        Log::error('Error fetching products: ' . $e->getMessage());
        return redirect()->route('dashboard')->with('error', 'Ocorreu um erro ao buscar produtos.');
    }
}

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validated();

            if ($request->hasFile('photo')) {
                $imageName = time().'.'.$request->photo->extension();
                $request->photo->move(public_path('images'), $imageName);
                $validatedData['photo'] = $imageName;
            }

            $validatedData['created_at'] = now();
            $validatedData['updated_at'] = now();

            $this->productRepository->create($validatedData);

            DB::commit();

            return redirect()->route('products.index')->with('success', 'Produto cadastrado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error storing product: ' . $e->getMessage());
            return redirect()->route('products.index')->with('error', 'Ocorreu um erro ao criar o produto.');
        }
    }

    public function edit($id)
    {
        try {
            $product = $this->productRepository->find($id);
            $categories = Category::all();
            return view('dashboard.products.edit', compact('product', 'categories'));
        } catch (\Exception $e) {
            Log::error('Error loading edit product form: ' . $e->getMessage());
            return redirect()->route('products.index')->with('error', 'Ocorreu um erro ao carregar o formulário de edição do produto.');
        }
    }

    public function update(UpdateProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $product = $this->productRepository->find($id);
            $validatedData = $request->validated();

            $oldValues = [];
            foreach ($validatedData as $key => $value) {
                if ($product->{$key} !== $value) {
                    $oldValues[$key] = $product->{$key};
                }
            }

            $product->update($validatedData);

            foreach ($oldValues as $field => $oldValue) {
                ProductHistory::create([
                    'product_id' => $product->id,
                    'field' => $field,
                    'old_value' => $oldValue,
                    'new_value' => $validatedData[$field],
                ]);
            }

            DB::commit();

            return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating product: ' . $e->getMessage());
            return redirect()->route('products.index')->with('error', 'Ocorreu um erro ao atualizar o produto.');
        }
    }
    public function destroy($id)
    {
        try {
            $product = $this->productRepository->find($id);
            \DB::table('product_movements')->where('product_id', $product->id)->delete();
            $this->productRepository->delete($product);

            return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
        } catch (\Exception $e) {
            Log::error('Error deleting product: ' . $e->getMessage());
            return redirect()->route('products.index')->with('error', 'Ocorreu um erro ao excluir o produto.');
        }
    }

    public function exportProducts()
    {
        try {
            return Excel::download(new ProductsExport, 'products.xlsx');
        } catch (\Exception $e) {
            Log::error('Error exporting products: ' . $e->getMessage());
            return redirect()->route('products.index')->with('error', 'Ocorreu um erro ao exportar os produtos.');
        }
    }
}
