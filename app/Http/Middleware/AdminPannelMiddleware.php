<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;

class AdminPannelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()==null)
            return redirect()->route('home');
        elseif(auth()->user()->role!=='admin' and auth()->user()->role!=='redactor')
            return redirect()->route('main.index');

            $oppositeAdminUrl = url()->full();
            if(config('app.city') === 'Астана') {
                $oppositeAdminUrl = str_replace('astana.', '', $oppositeAdminUrl);
            }
            else {
                $oppositeAdminUrl = str_replace('expertremonta.kz', 'astana.expertremonta.kz', $oppositeAdminUrl);
            }
            View::share('oppositeAdminUrl', $oppositeAdminUrl);

        return $next($request);
    }
}
