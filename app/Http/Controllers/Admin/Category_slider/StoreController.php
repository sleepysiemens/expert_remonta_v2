<?php

namespace App\Http\Controllers\Admin\Category_slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CategoryImage;


class StoreController extends Controller
{
    public function index()
    {
        $name=request()->file('src')->getClientOriginalName();
        $data=request()->validate(['category_id'=>'required|integer', 'src'=>'required']);
        $sql_data=['src'=>$name, 'category_id'=>request()->category_id];

        $file = request()->file('src');
        $file->move(public_path() . '/img/category_slider/'.request()->category_id.'/',$name);

        CategoryImage::create($sql_data);
        //$categories=Category::all();

        return redirect()->route('admin.category_slider.index');
    }
}
