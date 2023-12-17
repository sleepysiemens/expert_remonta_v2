<?php

namespace App\Http\Controllers\Admin\Main\MainText;

use App\Http\Controllers\Controller;
use App\Models\MainText;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\About;


class IndexController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $texts=MainText::all();


        return view('admin.main.main_text.index', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'texts']));
    }
}
