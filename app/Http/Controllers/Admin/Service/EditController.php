<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\Seo;


class EditController extends Controller
{
    public function index(Service $service)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $seos=Seo::query()->where('page','=','uslugi/'.$service->url)->get();

        return view('admin.service.edit', compact(['service', 'reviews', 'questions', 'services', 'categories', 'sales', 'seos']));
    }
}
