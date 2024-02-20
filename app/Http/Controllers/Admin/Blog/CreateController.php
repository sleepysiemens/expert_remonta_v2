<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\BlogCategory;


class CreateController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $items=BlogCategory::whereNull('parent_id')->with('childs.childs')->get();

        return view('admin.blog.create', compact(['items', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
