<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductHistory;
use Illuminate\Http\Request;

class ProductHistoryController extends Controller
{
    public function index(Request $request)
    {
        $productIdsWithHistory = ProductHistory::distinct()->pluck('product_id');

        $products = Product::whereIn('id', $productIdsWithHistory)->get();

        $selectedProductId = $request->input('product');

        if ($selectedProductId) {
            $productHistory = ProductHistory::where('product_id', $selectedProductId)->latest()->paginate(10);
        } else {
            $productHistory = ProductHistory::whereIn('product_id', $productIdsWithHistory)->latest()->paginate(10);
        }

        return view('dashboard.products.history.index',  compact('productHistory', 'products', 'selectedProductId'));
    }
}
