<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Services\ReportService;


class ReportController extends Controller
{

    public function __construct(protected ReportService $reportService)
    {
    }
    public function stockReport()
    {
        $products = $this->reportService->getStockReport();
        return view('dashboard.reports.stock', compact('products'));
    }

    public function rankingReport()
    {
        $productsData = $this->reportService->getRankingReport();
        return view('dashboard.reports.ranking', compact('productsData'));
    }
}
