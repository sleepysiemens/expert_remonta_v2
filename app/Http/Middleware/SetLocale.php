<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\App;
use Jenssegers\Date\Date;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $req, Closure $next): Response
    {
        $locale = 'ru';
        if(isset($_COOKIE['locale']) && $_COOKIE['locale']=='kz') {
            // у laravel локаль такая - kk для казахского
            // https://laravel-lang.com/usage-list-of-locales.html#list_of_codes_with_names
            $locale = 'kk';
        }
        View::share('locale', $locale);
        App::setLocale($locale);
        Date::setLocale($locale);
        
        return $next($req);
    }
}
