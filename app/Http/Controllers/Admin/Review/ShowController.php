<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;


class ShowController extends Controller
{
    public function index(Review $review)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();


        return view('admin.review.show', compact(['review', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
