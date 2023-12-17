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


class EditController extends Controller
{
    public function index(Header $header)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();

        return view('admin.main.header.edit', compact(['header', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
