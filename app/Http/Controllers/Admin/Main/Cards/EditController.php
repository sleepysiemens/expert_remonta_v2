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


class EditController extends Controller
{
    public function index(WelcomeCard $WelcomeCards)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();

        return view('admin.main.welcome_cards.edit', compact(['WelcomeCards', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
