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


class EditController extends Controller
{
    public function index(Seo $seo)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();


        return view('admin.seo.edit', compact(['seo', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
