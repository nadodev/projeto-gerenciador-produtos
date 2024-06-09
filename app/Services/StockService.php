<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductMovement;
use Illuminate\Support\Facades\DB;

class StockService
{
    public function updateStock(Product $product, int $quantityToRemove)
    {
        if ($quantityToRemove > $product->stock) {
            throw new \Exception('A quantidade solicitada para baixar é maior que o estoque disponível.');
        }

        DB::transaction(function () use ($product, $quantityToRemove) {
            $movement = ProductMovement::where('product_id', $product->id)
                        ->where('type', 'exit')
                        ->first();

            if ($movement) {
                $movement->quantity += $quantityToRemove;
                $movement->updated_at = now();
                $movement->save();
            } else {
                ProductMovement::create([
                    'product_id' => $product->id,
                    'type' => 'exit',
                    'quantity' => $quantityToRemove,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $product->decrement('stock', $quantityToRemove);
        });
    }
}
