<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\Application;
use App\Models\Seo;



class EditController extends Controller
{
    public function index(Category $category)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $service=service::query()->where('id','=',$category->service_id)->get();
        $seos=Seo::query()->where('page','=','uslugi/'.$service[0]->url.'/'.$category->url)->get();

        return view('admin.category.edit', compact(['category', 'reviews', 'questions', 'services', 'categories', 'sales', 'seos']));
    }
}
