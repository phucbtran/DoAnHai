<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\ProductRepository::class, \App\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductTypeRepository::class, \App\Repositories\ProductTypeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SupplierRepository::class, \App\Repositories\SupplierRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProducerRepository::class, \App\Repositories\ProducerRepositoryEloquent::class);
        //:end-bindings:
    }
}
