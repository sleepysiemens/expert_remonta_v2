<?php

namespace App\Http\Controllers\Admin\Main\MainText;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\MainText;


class EditController extends Controller
{
    public function index(MainText $text)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();

        return view('admin.main.main_text.edit', compact(['text', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
