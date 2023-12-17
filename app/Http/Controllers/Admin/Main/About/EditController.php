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


class EditController extends Controller
{
    public function index(About $about)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();

        return view('admin.main.about.edit', compact(['about', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
