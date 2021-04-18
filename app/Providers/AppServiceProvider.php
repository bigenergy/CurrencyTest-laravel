<?php

namespace App\Providers;

use App\Repositories\Currency\CurrencyRepository;
use App\Repositories\Currency\EloquentCurrencyRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            CurrencyRepository::class,
            EloquentCurrencyRepository::class
        );
    }
}
