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
use App\Models\Menu;

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
      //$menu=Menu::where('url', '!=', '/')->whereNull('parent_id')->with('childs.childs')->get();
      $services = \App\Models\service::with('categories')->get();
      //dd($services);
      View::share('services', $services);
      //dd($menu);
      //dd($cities);
      //dd($_SERVER['REQUEST_URI']);
      $uri = $_SERVER['REQUEST_URI'];
      //dd(substr($uri, 1));

      $tel = $phone[0]->link; 
      $tel = str_replace('tel:', '', $tel); 
      $telArr = str_split($tel);
      $tel = '';
      foreach($telArr as $idx => $char) {
        if($idx === 2) $tel .= " ($char";  
        else if($idx === 4) $tel .= "$char) "; 
        else $tel .= "$char";
      }

      View::share('whatsapp', $whatsapp);
      View::share('telegram', $telegram);
      View::share('instagram', $instagram);
      View::share('phone', $phone);
      View::share('tel', $tel);
      View::share('cities', $cities);
      //View::share('menu', $menu);
      View::share('uri', substr($uri, 1));

      $userIP=$_SERVER['REMOTE_ADDR'];
      $location=Location::get($userIP);
      //$cityCookie = $req->cookie('city');
      $cityCookie = Cookie::get('city');
      //dd($cityCookie);

      $usr_city = '';

      if($cityCookie) $usr_city = $cityCookie;
      // тут можно добавить автоматический сет куки если куки нет, но локация определена как эти 2 города
      else if($location!=false && in_array($location->cityName, ['Astana', 'Almaty']))
        $usr_city = cityEnToRu($location->cityName);
        // если определило другой город по локации, ставим город текущего поддомена
        if($usr_city !== env('APP_CITY')) $usr_city = env('APP_CITY');
      else
        $usr_city= env('APP_CITY');

      View::share('usr_city', $usr_city);
      View::share('location', $location);
        

      return $next($request);
    }
}
