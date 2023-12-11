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


class ShowController extends Controller
{
    public function __invoke(About $about)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();


        return view('admin.main.about.show', compact(['about', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}