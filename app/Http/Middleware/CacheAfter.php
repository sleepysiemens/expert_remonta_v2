<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\App;
 
class CacheAfter
{
    public function handle(Request $req, Closure $next): Response
    {
        //dd($req->getMethod());
        $res = $next($req);
 
        // Perform action
        //dd($res);
        $cacheKey = ($_SERVER['REQUEST_URI']) . ':' . App::getLocale();
        // кэшируем все GET запросы с кодом 200, которые не в кэше и без GET-параметров
        if(
            $req->getMethod() === 'GET' 
            && $res->getStatusCode() === 200 
            && !Cache::has($cacheKey)
            && !str_contains($cacheKey, '?')
        ) {
            $html = $res->getContent();
            //dd($cacheKey);
            Cache::put($cacheKey, $html, $seconds = 86400);
        }
 
        return $res;
    }
}