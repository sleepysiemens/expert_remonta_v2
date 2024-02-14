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
use App\Models\City;



class CitiesController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $galleries=gallery::all();
        $items=City::all();

        return view('admin.city.index', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'items']));
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

        return view('admin.city.create', compact('reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'menu'));
    }

    public function store(Request $req)
    {

        //$sql_data = ['title'=>$req->title, 'url'=> $req->url, 'parent_id' => $req->parent_id];
        Menu::create($req->all());

        return redirect()->route('admin.city.index');
    }

    public function edit(City $city)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=Sale::all();
        $galleries=gallery::all();

        return view('admin.city.edit', compact(['city', 'reviews', 'questions', 'services', 'categories', 'sales', 'galleries']));
    }

    public function update(Request $req, City $city)
    {
        $req->merge(['fr_busy' => $req->fr_busy === 'on']);
      $city->update($req->all());

      return redirect()->route('admin.city.index');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('admin.city.index');
    }
}
