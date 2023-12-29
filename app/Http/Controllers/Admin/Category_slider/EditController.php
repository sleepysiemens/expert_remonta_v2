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


class EditController extends Controller
{
    public function index(CategoryImage $category_slider)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $CategoryImages=CategoryImage::all();

        return view('admin.category_slider.edit', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'category_slider']));
    }
}
