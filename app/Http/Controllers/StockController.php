<?php
namespace App\Http\Controllers;

use App\Http\Requests\UpdateStockRequest;
use App\Models\Product;
use App\Models\ProductMovement;
use App\Services\StockService;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __construct(protected StockService $stockService)
    {}
    public function update(UpdateStockRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $quantityToRemove = abs($validatedData['quantity']);

        try {
            $this->stockService->updateStock($product, $quantityToRemove);
            return redirect()->back()->with('success', 'Baixa de estoque realizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
