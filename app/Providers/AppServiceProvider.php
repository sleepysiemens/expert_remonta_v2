<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Telegram;
use Illuminate\Support\Facades\Http;
//use Illuminate\Support\Facades\URL;

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
        /*if ($this->app->environment('production') 
            && !preg_match('/[0-9]/', $_SERVER['HTTP_HOST'])
        ) {
            $this->app['request']->server->set('HTTPS','on');
            //URL::forceSchema('https');
        }*/
        /*Http::macro('tgBot', function () {
            return Http::baseUrl("https://api.telegram.org/bot" . env('BOT_TOKEN'))->withHeaders([
              'Content-Type' => 'application/json',
            ]);
        });*/
    }
}
