<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\Blog;


class ShowController extends Controller
{
    public function index(Blog $blog)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $blogs=Blog::all();


        return view('admin.blog.show', compact(['blog', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
