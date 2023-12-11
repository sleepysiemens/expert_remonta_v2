<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\sale;
use App\Models\gallery;


class CreateController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $galleries=gallery::all();

        return view('admin.gallery.create', compact('reviews', 'questions', 'services', 'categories', 'sales', 'galleries'));
    }
}
