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


class EditController extends Controller
{
    public function index(ServiceImage $service_slider)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $ServiceImages=ServiceImage::all();

        return view('admin.service_slider.edit', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'service_slider']));
    }
}
