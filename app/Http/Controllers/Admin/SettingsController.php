<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\Gallery;
use App\Models\Menu;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Support\Facades\Cache;



class SettingsController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $galleries=gallery::all();

        return view('admin.settings.index', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'galleries']));
    }

    public function resetCache(Request $req)
    {
      Cache::flush();
      ResponseCache::clear();
      $page = parse_url($_SERVER['HTTP_REFERER'])['path'];
      //return redirect()->route('admin.settings.index')->with('msg', 'Кэш сайта очищен');
      return redirect($page)->with('msg', 'Кэш сайта очищен');
    }

    public function cacheAll() {
      // кэширование всей внутрянки Laravel
      // https://laravel.com/docs/10.x/deployment#optimization
      // для config cache нужно заменить все env на config видимо
      Artisan::call('config:cache');
      Log::channel('artisan')->debug(Artisan::output());
      Artisan::call('event:cache');
      Log::channel('artisan')->debug(Artisan::output());
      Artisan::call('route:cache');
      Log::channel('artisan')->debug(Artisan::output());
      Artisan::call('view:cache');
      Log::channel('artisan')->debug(Artisan::output());
      return redirect()->route('admin.settings.index')->with('msg', 'Внутренний кэш Laravel создан');
    }
    public function uncacheAll() {
      // сброс кэша всей внутрянки лары
      //Log::channel('artisan')->debug(Artisan::call('config:clear'));
      //Log::channel('artisan')->debug(Artisan::call('event:clear'));
      //Log::channel('artisan')->debug(Artisan::call('route:clear'));
      //Log::channel('artisan')->debug(Artisan::call('view:clear'));
      Artisan::call('config:clear');
      Log::channel('artisan')->debug(Artisan::output());
      Artisan::call('event:clear');
      Log::channel('artisan')->debug(Artisan::output());
      Artisan::call('route:clear');
      Log::channel('artisan')->debug(Artisan::output());
      Artisan::call('view:clear');
      Log::channel('artisan')->debug(Artisan::output());

      return redirect()->route('admin.settings.index')->with('msg', 'Внутренний кэш Laravel удален');
    }

    public function login() {
      $file = file_get_contents(base_path() . '/vendor/laravel/ui/src/AuthRouteMethods.php');
      preg_match("/get\('([a-z0-9A-Z]*)'/u", $file, $matches);
      //dd($matches);
      $loginUrl = $matches[1];

      $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $galleries=gallery::all();

        return view('admin.settings.secretlogin', compact(['loginUrl', 'reviews', 'questions', 'services', 'categories', 'sales', 'galleries']));
    }

    public function loginPatch(Request $req) {
      //dd($req->all());
      $file = file_get_contents(base_path() . '/vendor/laravel/ui/src/AuthRouteMethods.php');
      $file = preg_replace("/get\('([a-z0-9A-Z]*)'/u", "get('" . $req->loginUrl . "'", $file, 1);
      $file = preg_replace("/post\('([a-z0-9A-Z]*)'/u", "post('" . $req->loginUrl . "'", $file, 1);
      //dd($file);

      file_put_contents(base_path() . '/vendor/laravel/ui/src/AuthRouteMethods.php', $file);

      return redirect()->route('admin.settings.login')->with('msg', 'Адрес входа изменен');
    }



}
