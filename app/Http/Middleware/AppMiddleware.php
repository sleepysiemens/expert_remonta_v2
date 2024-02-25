<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cookie;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\App;
use Jenssegers\Date\Date;

use App\Models\Contact;
use App\Models\City;
use App\Models\Menu;
use App\Models\Counter;

class AppMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      /*$locale = 'ru';
      if(isset($_COOKIE['locale']) && $_COOKIE['locale']=='kz') {
        // у laravel локаль такая - kk для казахского
        // https://laravel-lang.com/usage-list-of-locales.html#list_of_codes_with_names
        $locale = 'kk';
      }*/

      $whatsapp=Contact::query()->select('link')->where('name','=','whatsapp')->get();
      $telegram=Contact::query()->select('link')->where('name','=','telegram')->get();
      $instagram=Contact::query()->select('link')->where('name','=','instagram')->get();
      $phone=Contact::query()->select('link')->where('name','=','phone')->get();
      $googlemaps=Contact::query()->select('link')->where('name','=','googlemaps')->first();
      $cities=City::all();
      $menu=Menu::where('url', '!=', '/')->whereNull('parent_id')->with('childs.childs')->get();
      $services = \App\Models\service::with('categories')->get();
      $blogCategories = \App\Models\BlogCategory::whereNull('parent_id')->with('childs.childs')
      ->get();
      View::share('blogCategories', $blogCategories);
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
      View::share('googlemaps', $googlemaps);
      View::share('cities', $cities);
      View::share('menu', $menu);
      View::share('uri', substr($uri, 1));

      $userIP=$_SERVER['REMOTE_ADDR'];
      $location = false;
      if(config('app.env' === 'production')) $location=Location::get($userIP);
      //$cityCookie = $req->cookie('city');
      $cityCookie = Cookie::get('city');
      //dd($cityCookie);

      $usr_city = '';

      if($cityCookie) $usr_city = $cityCookie;
      // тут можно добавить автоматический сет куки если куки нет, но локация определена как эти 2 города
      else if($location!=false && in_array($location->cityName, ['Astana', 'Almaty']))
        $usr_city = cityEnToRu($location->cityName);
        // если определило другой город по локации, ставим город текущего поддомена
        if($usr_city !== config('app.city')) $usr_city = config('app.city');
      else
        $usr_city= config('app.city');

      View::share('usr_city', $usr_city);
      View::share('location', $location);
      #View::share('locale', $locale);

      $code=Counter::first();
      View::share('code', $code);
      
      #App::setLocale($locale);
      #Date::setLocale($locale);
      //App::setLocale('en');
      //dd($locale);

      //dd(__('Оставить отзыв'));

      return $next($request);
    }
}
