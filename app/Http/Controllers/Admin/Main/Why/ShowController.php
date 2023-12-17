<?php

namespace App\Http\Controllers\Admin\Main\Why;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\WhyCard;


class ShowController extends Controller
{
    public function index(WhyCard $WhyCards)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();

        return view('admin.main.why_cards.show', compact(['WhyCards', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
