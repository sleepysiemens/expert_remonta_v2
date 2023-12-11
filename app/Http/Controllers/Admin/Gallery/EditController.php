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


class EditController extends Controller
{
    public function index(Gallery $gallery)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $galleries=gallery::all();

        return view('admin.gallery.edit', compact(['gallery', 'reviews', 'questions', 'services', 'categories', 'sales', 'galleries']));
    }
}
