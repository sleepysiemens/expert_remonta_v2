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


class CreateController extends Controller
{
    public function __invoke()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=Sale::all();
        $WhyCards=WhyCard::all();

        return view('admin.main.why_cards.create', compact('reviews', 'questions', 'services', 'categories', 'sales', 'WhyCards'));
    }
}