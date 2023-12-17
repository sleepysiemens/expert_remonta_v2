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


class EditController extends Controller
{
    public function index(WhyCard $WhyCards)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();

        return view('admin.main.why_cards.edit', compact(['WhyCards', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
