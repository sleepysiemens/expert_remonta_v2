<?php

namespace App\Http\Controllers\Admin\Main\Header;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\Header;


class ShowController extends Controller
{
    public function index(Header $header)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();


        return view('admin.main.header.show', compact(['header', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
