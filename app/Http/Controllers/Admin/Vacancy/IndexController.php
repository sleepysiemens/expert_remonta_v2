<?php

namespace App\Http\Controllers\Admin\Vacancy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\City;
use App\Models\Vacancy;
use App\Models\VacancyCategory;



class IndexController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $galleries=gallery::all();
        $vacancies = Vacancy::with('city')->with('category')->get();

        return view('admin.vacancy.index', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'vacancies']));
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

        $cities = City::pluck('city', 'id')->all();
        //dd($cities[0]);
        $vacancyCategories = VacancyCategory::pluck('name', 'id');

        //dd(VacancyCategory::pluck('name', 'id'));

        return view('admin.vacancy.create', compact('reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'menu', 'vacancyCategories', 'cities'));
    }

    public function store(Request $req)
    {
      //dd($req->all());
        //$sql_data = ['title'=>$req->title, 'url'=> $req->url, 'parent_id' => $req->parent_id];
        Vacancy::create($req->all());

        return redirect()->route('admin.vacancy.index');
    }

    public function edit(Vacancy $vacancy)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=Sale::all();
        $galleries=gallery::all();
        $cities = City::pluck('city', 'id')->all();
        //dd($cities[0]);
        $vacancyCategories = VacancyCategory::pluck('name', 'id');

        return view('admin.vacancy.edit', compact(['vacancy', 'reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'cities', 'vacancyCategories']));
    }

    public function update(Request $req, Vacancy $vacancy)
    {
      $vacancy->update($req->all());

      return redirect()->route('admin.vacancy.index');
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->route('admin.vacancy.index');
    }
}
