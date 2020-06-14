<?php

namespace App\Providers;

use App\Models\Artikel;
use App\Models\Modul;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->share('moduls', Modul::get());
        // view()->share('artikels', Artikel::get());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }
}
