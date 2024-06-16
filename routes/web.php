<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticationController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthenticationController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

// Route::middleware(['auth'])->group(function () {

// });
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Category
Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/category/create', [CategoryController::class, 'store'])->name('admin.category.store');
Route::post('/category/edit', [CategoryController::class, 'store'])->name('admin.category.edit');
Route::post('/category/destroy', [CategoryController::class, 'store'])->name('admin.category.destroy');

// projects
Route::get('/projects', [ProjectController::class, 'index'])->name('admin.project.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.project.create');
Route::post('/projects/create', [ProjectController::class, 'store'])->name('admin.project.store');
Route::get('/projects/{id}/details', [ProjectController::class, 'show'])->name('admin.project.show');

// tasks
Route::get('/task/create', [ProjectController::class, 'show'])->name('admin.project.show');

// Clients

Route::get('/clients', [ClientController::class, 'index'])->name('admin.client.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('admin.client.create');
Route::post('/clients/create', [ClientController::class, 'store'])->name('admin.client.store');
