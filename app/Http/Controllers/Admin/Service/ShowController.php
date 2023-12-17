<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;


class ShowController extends Controller
{
    public function index(Service $service)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();


        return view('admin.service.show', compact(['service', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
