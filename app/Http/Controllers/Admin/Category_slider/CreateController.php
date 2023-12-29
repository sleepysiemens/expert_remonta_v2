<?php

namespace App\Http\Controllers\Admin\Category_slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\CategoryImage;



class CreateController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $CategoryImages=CategoryImage::all();

        return view('admin.category_slider.create', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'CategoryImages']));
    }
}
