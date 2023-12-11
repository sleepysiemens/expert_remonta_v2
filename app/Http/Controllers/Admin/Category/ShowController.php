<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\Application;


class ShowController extends Controller
{
    public function index(Category $category)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
	$sales=Sale::all();
        $service=Service::query()->where('id', '=' ,$category->service_id)->get();

        return view('admin.category.show', compact(['category' , 'service', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
