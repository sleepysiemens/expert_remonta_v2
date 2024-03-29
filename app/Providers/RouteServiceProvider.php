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
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */

    protected $namespace = 'App\Http\Controllers';  // добавьте эту строку


    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        // 5 заливок резюме файлов с одного IP в день
        RateLimiter::for('resumes', function (Request $request) {
            return $request->resume_file
              //? Limit::perMinute(1)->by($request->ip())
              ? Limit::perDay(5)->by($request->ip())
              : Limit::none();
        });

        $this->routes(function () {
            Route::middleware('api')
                ->namespace($this->namespace)  // добавьте эту строку
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)  // добавьте эту строку
                ->group(base_path('routes/web.php'));
        });
    }
}
