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
use App\Models\BlogCategory;


class EditController extends Controller
{
    public function index(Blog $blog)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $blogs=Blog::all();
        $items=BlogCategory::whereNull('parent_id')->with('childs.childs')->get();

        return view('admin.blog.edit', compact(['items', 'blog', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
