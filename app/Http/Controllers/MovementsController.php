<?php

namespace App\Http\Controllers;

use App\Models\ProductMovement;

class MovementsController extends Controller
{
    public function index()
    {
        $movements = ProductMovement::with('product')->get();

        return view('dashboard.reports.movements', compact('movements'));
    }
}
