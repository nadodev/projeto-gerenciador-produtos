<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategorytRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.category.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(StoreCategorytRequest $request)
    {
        try {
            $validatedData = $request->validated();
            Category::create($validatedData);
            return redirect()->route('admin.category.index')->with('success', 'Categoria cadastrada com sucesso!');
        } catch (\Exception $e) {
            Log::error('Error storing category: ' . $e->getMessage());
            return redirect()->route('admin.category.index')->with('error', 'Ocorreu um erro ao criar a categoria.');
        }
    }

    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required'
            ]);

            $this->categoryRepository->update($category, $validatedData);
            return redirect()->route('category.index')->with('success', 'Categoria atualizada com sucesso!');
        } catch (\Exception $e) {
            Log::error('Error updating category: ' . $e->getMessage());
            return redirect()->route('category.index')->with('error', 'Ocorreu um erro ao atualizar a categoria.');
        }
    }

    public function destroy(Category $category)
    {
        try {
            $this->categoryRepository->delete($category);
            return redirect()->route('category.index')->with('success', 'Categoria excluída com sucesso!');
        } catch (\Exception $e) {
            Log::error('Error deleting category: ' . $e->getMessage());
            return redirect()->route('category.index')->with('error', 'Ocorreu um erro ao excluir a categoria.');
        }
    }
}
