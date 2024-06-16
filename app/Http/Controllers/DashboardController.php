<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;


class DashboardController extends Controller
{
    public function index()
    {
        $totalCategorias = Category::count();
        return view('dashboard.index', compact('totalCategorias'));
    }
}
