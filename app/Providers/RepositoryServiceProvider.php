<?php

namespace Satelite\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Satelite\Products\Repositories\ProductRepository::class, \Satelite\Products\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Products\ProductRepository::class, \App\Repositories\Products\ProductRepositoryEloquent::class);
        $this->app->bind(\Satelite\Repositories\Products\ProductImageRepository::class, \Satelite\Repositories\Products\ProductImageRepositoryEloquent::class);
        //:end-bindings:
    }
}
