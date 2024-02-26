<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\App;

class LoadCache
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $req, Closure $next): Response
    {
        $cacheKey = ($_SERVER['REQUEST_URI']) . ':' . App::getLocale();
        // если GET запрос и в кэше есть ключ
        if($req->getMethod() !== 'GET') return $next($req);
        //dd($cacheKey);
        if(!Cache::has($cacheKey)) return $next($req);
        // и если обращение напрямую по айпишнику, не грузим кэш
        if(preg_match('/[0-9]/', $_SERVER['HTTP_HOST'])) return $next($req);

        //dd($cacheKey);
        $html = Cache::get($cacheKey);
        // вроде работает!!!
        preg_match('/name="_token" value="([^"]*)"/', $html, $matches);
        //dd($matches);
        if(isset($matches[1])) $html = str_replace($matches[1], csrf_token(), $html);
        //dd($html);
        return response($html, 200)->withHeaders(['Content-Type' => 'text/html']);
        //return $res;

        //dd('processing');
        return $next($req);
    }
}
