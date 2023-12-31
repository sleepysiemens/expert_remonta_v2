<?php

namespace App\Http\Controllers\Admin\NewReview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\NewReview;


class IndexController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $new_reviews=NewReview::all();

        return view('admin.new_review.index', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'new_reviews']));
    }
}
