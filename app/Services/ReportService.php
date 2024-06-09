<?php

namespace App\Services;

use App\Models\Product;

class ReportService
{
    public function getStockReport()
    {
        return Product::all();
    }

    public function getRankingReport()
    {
        $products = Product::with(['movements' => function ($query) {
            $query->selectRaw('product_id,
                SUM(CASE WHEN type = "entry" THEN quantity ELSE 0 END) as total_entries,
                SUM(CASE WHEN type = "exit" THEN quantity ELSE 0 END) as total_exits')
                ->groupBy('product_id');
        }])->whereHas('movements', function ($query) {
            $query->whereIn('type', ['entry', 'exit']);
        })->get()->sortByDesc(function ($product) {
            return $product->movements->sum('total_exits');
        })->take(10);

        return $products->map(function ($product) {
            $difference = $product->movements->sum('total_entries') - $product->movements->sum('total_exits');
            if ($difference < 0) {
                return [
                    'name' => $product->name,
                    'difference' => $difference,
                ];
            }
        })->filter();
    }
}
