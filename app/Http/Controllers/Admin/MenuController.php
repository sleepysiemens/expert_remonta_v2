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



class MenuController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $galleries=gallery::all();
        $menu=Menu::with('parent')->get();

        return view('admin.menu.index', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'menu']));
    }

    public function create()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=Sale::all();
        $galleries=Gallery::all();
        $menu=Menu::all();

        return view('admin.menu.create', compact('reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'menu'));
    }

    public function store(Request $req)
    {

        $sql_data = ['title'=>$req->title, 'url'=> $req->url, 'parent_id' => $req->parent_id];
        Menu::create($sql_data);

        return redirect()->route('admin.menu.index');
    }

    public function edit(Menu $menu)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=Sale::all();
        $galleries=gallery::all();
        $menuItems=Menu::all();

        return view('admin.menu.edit', compact(['menu', 'reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'menuItems']));
    }

    public function update(Request $req, Menu $menu)
    {
      $sql_data = ['title'=>$req->title, 'url'=> $req->url, 'parent_id' => $req->parent_id];

      $menu->update($sql_data);

      return redirect()->route('admin.menu.index');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menu.index');
    }
}
