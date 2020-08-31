<?php

namespace App\Providers;

use App\Repositories\CarRepository;
use App\Repositories\CarRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
    }
}
