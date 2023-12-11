<?php

namespace App\Http\Controllers\Admin\Main\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\About;


class IndexController extends Controller
{
    public function __invoke()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $abouts=About::all();


        return view('admin.main.about.index', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'abouts']));
    }
}