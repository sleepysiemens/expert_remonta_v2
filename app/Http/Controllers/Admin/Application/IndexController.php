<?php

namespace App\Http\Controllers\Admin\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\Application;


class IndexController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $applications=application::with('sale')->with('vacancy')->get();
        //dd($applications[2]->vacancy);

        return view('admin.application.index', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'applications']));
    }
}
