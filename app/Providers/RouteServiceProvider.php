<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        // $this->routes(function () {
        // });
        $this->mapRoute();
    }

    protected function mapRoute()
    {
        //API
        foreach (glob(base_path('routes/api/*.php')) as $file) {
            Route::prefix('api')
                ->group($file);
        }

        //FRONTEND
        Route::middleware('web')
            ->group(base_path('routes/frontend/dograde.php'));

        //BACKEND
        foreach (glob(base_path('routes/backend/*.php')) as $file) {
            Route::middleware('auth')
                ->group($file);
        }

        //AUTH
        Route::middleware('web')
            ->group(base_path('routes/auth/auth.php'));
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(10000)->by($request->user()?->id ?: $request->ip());
        });
    }
}
