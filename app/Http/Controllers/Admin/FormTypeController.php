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
use App\Models\FormType;



class FormTypeController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $galleries=gallery::all();
        $formtypes = FormType::all();

        return view('admin.formtype.index', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'formtypes']));
    }

    


    public function edit(FormType $type)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=Sale::all();
        $galleries=gallery::all();

        return view('admin.formtype.edit', compact(['type', 'reviews', 'questions', 'services', 'categories', 'sales', 'galleries']));
    }

    public function update(Request $req, FormType $type)
    {

      $type->update($req->all());

      return redirect()->route('admin.formtype.index');
    }


}
