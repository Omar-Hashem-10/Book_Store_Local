<?php

namespace App\Providers;

use App\Faker\CategoryProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        fake()->addProvider(new CategoryProvider(fake()));
        Paginator::useBootstrapFive();
    }
}
