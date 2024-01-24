<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Vacancy;
use App\Models\VacancyCategory;

class VacancyController extends Controller
{

    public function index(Request $req) {
      $vacancies = Vacancy::with('city')->with('category')->get();
      $vacancyCategories = VacancyCategory::all();
      //dd($vacancies);
      $page = 'vacancies';

      return view('vacancies.index', compact('page', 'vacancies', 'vacancyCategories'));
    }

    public function show(Request $req, Vacancy $vacancy) {
      $page = 'vacancy';

      return view('vacancies.show', compact('page', 'vacancy'));
    }






}
