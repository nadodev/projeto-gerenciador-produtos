<?php

namespace App\Providers;

use App\Repositories\Categories\CategoryRepository;
use App\Repositories\Categories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Products\ProductRepository;
use App\Repositories\Products\Contracts\ProductRepositoryInterface;
use App\Services\ReportService;
use App\Services\StockService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);

        $this->app->singleton(ReportService::class, function ($app) {
            return new ReportService();
        });

        $this->app->singleton(StockService::class, function ($app) {
            return new StockService();
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
