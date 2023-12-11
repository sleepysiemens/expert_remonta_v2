<?php

namespace App\Http\Controllers\Admin\Main\Cards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\WelcomeCard;


class ShowController extends Controller
{
    public function __invoke(WelcomeCard $WelcomeCards)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();

        return view('admin.main.welcome_cards.show', compact(['WelcomeCards', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}