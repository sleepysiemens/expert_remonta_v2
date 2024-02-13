<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Telegram;
use Illuminate\Support\Facades\Http;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Telegram::class, function($app) {
            return new Telegram();
          });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*Http::macro('tgBot', function () {
            return Http::baseUrl("https://api.telegram.org/bot" . env('BOT_TOKEN'))->withHeaders([
              'Content-Type' => 'application/json',
            ]);
        });*/
    }
}
