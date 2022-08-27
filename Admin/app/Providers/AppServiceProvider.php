<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Product\ProductRepositoryInterface::class,
            \App\Repositories\Product\ProductRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Cart\CartRepositoryInterface::class,
            \App\Repositories\Cart\CartRepository::class
        );
        $this->app->singleton(
            \App\Repositories\user\UserRepositoryInterface::class,
            \App\Repositories\user\UserRepository::class
        );
        $this->app->singleton(
            \App\Repositories\ApiProduct\ApiProductRepositoryInterface::class,
            \App\Repositories\ApiProduct\ApiProductRepository::class
        );
        $this->app->singleton(
            \App\Repositories\ApiCategory\ApiCategoryRepositoryInterface::class,
            \App\Repositories\ApiCategory\ApiCategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\ApiPost\ApiPostRepositoryInterface::class,
            \App\Repositories\ApiPost\ApiPostRepository::class
        );
        $this->app->singleton(
            \App\Repositories\ApiOrder\ApiOrderRepositoryInterface::class,
            \App\Repositories\ApiOrder\ApiOrderRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Order\OrderRepositoryInterface::class,
            \App\Repositories\Order\OrderRepository::class
        );
        $this->app->singleton(
            \App\Repositories\OrderDetail\OrderDetailRepositoryInterface::class,
            \App\Repositories\OrderDetail\OrderDetailRepository::class
        );
        $this->app->singleton(
            \App\Repositories\ApiProfile\ApiProfileRepositoryInterface::class,
            \App\Repositories\ApiProfile\ApiProfileRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}