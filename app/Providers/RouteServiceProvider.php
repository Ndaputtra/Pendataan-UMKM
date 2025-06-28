<?php

namespace App\Providers;

// Pastikan ini ada di bagian atas file
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;


class RouteServiceProvider extends ServiceProvider
{
    // ... kode lain di RouteServiceProvider.php ...

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        // Pastikan Anda memuat ini di dalam RouteServiceProvider.php
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        // ... mungkin ada kode lain di metode boot() seperti rate limiting ...
    }

    // ... metode mapApiRoutes atau mapWebRoutes mungkin ada di Laravel lama,
    // tapi di Laravel baru, mereka digantikan oleh blok di dalam boot() ...
}