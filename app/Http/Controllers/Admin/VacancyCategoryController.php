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
use App\Models\VacancyCategory;



class VacancyCategoryController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $galleries=gallery::all();
        $vcs=VacancyCategory::all();

        return view('admin.vc.index', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'vcs']));
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

        return view('admin.vc.create', compact('reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'menu'));
    }

    public function store(Request $req)
    {
      if(!$req->url) $req->merge(['url' => strtolower(translit($req->name))]);
      //dd($req->all());
      //dd(translit($req->url));
        VacancyCategory::create($req->all());

        return redirect()->route('admin.vc.index');
    }

    public function edit(VacancyCategory $vc)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=Sale::all();
        $galleries=gallery::all();

        return view('admin.vc.edit', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'vc']));
    }

    public function update(Request $req, VacancyCategory $vc)
    {
      if(!$req->url) $req->merge(['url' => strtolower(translit($req->name))]);
      $vc->update($req->all());

      return redirect()->route('admin.vc.index');
    }

    public function destroy(VacancyCategory $vc)
    {
        $vc->delete();
        return redirect()->route('admin.vc.index');
    }
}
