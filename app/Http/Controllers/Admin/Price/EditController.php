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



class EditController extends Controller
{
    public function index(Price $price)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();

        $price_categories=Price::query()->select('category')->distinct()->get();

        return view('admin.price.edit', compact(['price', 'reviews', 'questions', 'services', 'categories', 'price_categories', 'sales']));
    }
}
