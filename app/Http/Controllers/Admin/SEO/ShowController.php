<?php

namespace App\Http\Controllers\Admin\SEO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\Seo;


class ShowController extends Controller
{
    public function index(Seo $seo)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $seos=Seo::all();

        return view('admin.seo.show', compact(['seo', 'reviews', 'questions', 'services', 'categories', 'sales', 'seos']));
    }
}
