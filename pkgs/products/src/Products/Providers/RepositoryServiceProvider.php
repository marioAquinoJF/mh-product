<?php

namespace Satelite\Products\Providers;

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
      //  $this->app->bind(\Satelite\Products\Repositories\ProductRepository::class, \Satelite\Products\Repositories\ProductRepositoryEloquent::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Satelite\Products\Repositories\ProductRepository::class, \Satelite\Products\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\Satelite\ProductsRepositories\TesteRepository::class, \Satelite\ProductsRepositories\TesteRepositoryEloquent::class);
        //:end-bindings:
    }
}
