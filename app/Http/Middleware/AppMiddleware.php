<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cookie;
use Stevebauman\Location\Facades\Location;

use App\Models\Contact;
use App\Models\City;

class AppMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

      $whatsapp=Contact::query()->select('link')->where('name','=','whatsapp')->get();
      $telegram=Contact::query()->select('link')->where('name','=','telegram')->get();
      $instagram=Contact::query()->select('link')->where('name','=','instagram')->get();
      $phone=Contact::query()->select('link')->where('name','=','phone')->get();
      $cities=City::all();
      //dd($cities);

      View::share('whatsapp', $whatsapp);
      View::share('telegram', $telegram);
      View::share('instagram', $instagram);
      View::share('phone', $phone);
      View::share('cities', $cities);

      $userIP=$_SERVER['REMOTE_ADDR'];
      $location=Location::get($userIP);
      //$cityCookie = $req->cookie('city');
      $cityCookie = Cookie::get('city');
      //dd($cityCookie);

      if($cityCookie) $usr_city = $cityCookie;
      // тут можно добавить автоматический сет куки если куки нет, но локация определена как эти 2 города
      else if($location!=false && in_array($location->cityName, ['Astana', 'Almaty']))
        $usr_city = cityEnToRu($location->cityName);
      else
        $usr_city= env('APP_CITY_EN');

      View::share('usr_city', $usr_city);
        

      return $next($request);
    }
}
