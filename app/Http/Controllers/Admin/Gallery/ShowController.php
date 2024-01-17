<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\Gallery;


class ShowController extends Controller
{
    public function index(Gallery $gallery)
    {
        $reviews=Review::all();
        $questions=question::all();
        $services=service::all();
        $categories=Category::all();
        $sales=Sale::all();
        $galleries=Gallery::all();


        return view('admin.gallery.show', compact(['gallery', 'reviews', 'questions', 'services', 'categories', 'sales', 'galleries']));
    }
}
