<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Counter;



class CounterController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $galleries=gallery::all();
        $code=Counter::first();
        //dd($code);

        return view('admin.counter.index', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'code']));
    }

    public function store(Request $req)
    {
        $code=Counter::first();
        //$sql_data = ['title'=>$req->title, 'url'=> $req->url, 'parent_id' => $req->parent_id];
        $code->update($req->all());

        return redirect()->route('admin.counter.index');
    }



}
