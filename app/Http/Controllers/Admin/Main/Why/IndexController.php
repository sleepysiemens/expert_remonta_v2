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


class IndexController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $WhyCards=WhyCard::all();


        return view('admin.main.why_cards.index', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'WhyCards']));
    }
}
