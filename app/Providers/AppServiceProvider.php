<?php

namespace App\Providers;

use App\Repositories\Contracts\CategoryRepoInterfaces;
use App\Repositories\Contracts\ProductRepoInterfaces;
use App\Repositories\Eloquents\CategoryRepository;
use App\Repositories\Eloquents\ProductRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepoInterfaces::class, CategoryRepository::class);
        $this->app->bind(ProductRepoInterfaces::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
