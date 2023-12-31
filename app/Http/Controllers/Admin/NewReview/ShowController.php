<?php

namespace App\Http\Controllers\Admin\NewReview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Contact;
use App\Models\Sale;
use App\Models\Application;
use App\Models\NewReview;


class ShowController extends Controller
{
    public function index(NewReview $new_review)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();


        return view('admin.new_review.show', compact(['new_review', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
