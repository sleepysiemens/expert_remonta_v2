<?php

namespace App\Http\Controllers\Admin\FAQ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Contact;
use App\Models\Sale;


class EditController extends Controller
{
    public function index(Question $question)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();

        return view('admin.faq.edit', compact(['question', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
