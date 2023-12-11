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


class ShowController extends Controller
{
    public function index(Gallery $gallery)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $galleries=gallery::all();


        return view('admin.gallery.show', compact(['gallery', 'reviews', 'questions', 'services', 'categories', 'sales', 'galleries']));
    }
}
