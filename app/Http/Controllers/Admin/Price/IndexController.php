<?php

namespace App\Http\Controllers\Admin\Price;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Contact;
use App\Models\Sale;
use App\Models\price;



class IndexController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();

        $prices=Price::query()->groupBy('category','id')->orderBy('category')->get();

        return view('admin.price.index', compact(['reviews', 'questions', 'services', 'categories', 'prices', 'sales']));
    }
}
