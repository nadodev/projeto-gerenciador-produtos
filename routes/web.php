<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovementsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductHistoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticationController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthenticationController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('report/stock', [ReportController::class, 'stockReport'])->name('report.stock');
    Route::get('report/ranking', [ReportController::class, 'rankingReport'])->name('report.ranking');
    Route::get('movements', [MovementsController::class, 'index'])->name('movements.index');
    Route::put('stock/{product}', [StockController::class, 'update'])->name('stock.update');

    Route::resource('products', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::put('stock/update/{product}', [StockController::class, 'update'])->name('stock.update');

    Route::get('export-products', [ProductController::class ,'exportProducts'])->name('export.products');
    Route::get('/product-history', [ProductHistoryController::class, 'index'])->name('product-history.index');
});
