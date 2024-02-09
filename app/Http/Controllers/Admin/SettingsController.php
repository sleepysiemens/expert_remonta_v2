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

use Spatie\ResponseCache\Facades\ResponseCache;



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
      ResponseCache::clear();
      $page = parse_url($_SERVER['HTTP_REFERER'])['path'];
      //return redirect()->route('admin.settings.index')->with('msg', 'Кэш сайта очищен');
      return redirect($page)->with('msg', 'Кэш сайта очищен');
    }



}
