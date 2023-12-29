<?php

namespace App\Http\Controllers\Admin\Service_slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\ServiceImage;



class CreateController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $ServiceImages=ServiceImage::all();

        return view('admin.service_slider.create', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'ServiceImages']));
    }
}
