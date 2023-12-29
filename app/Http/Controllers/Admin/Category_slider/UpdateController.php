<?php

namespace App\Http\Controllers\Admin\Category_slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CategoryImage;


class UpdateController extends Controller
{
    public function index(CategoryImage $category_slider)
    {
        $data=request()->validate(['title'=>'required|string', 'category_id'=>'required|integer', 'src'=>'required']);

        if(request()->hasFile('src'))
        {
            $file = request()->file('src');
            $file->move(public_path() . '/img/categories/',request()->title.'-image.img');
            $file->move(public_path() . '/img/category_slider/'.request()->category_id.'/',request()->title.'-image.img');
        }
        else
            $sql_data=['title'=>request()->title, 'url'=>request()->url, 'description'=>request()->description, 'service_id'=>request()->service_id];

        $category_slider->update($sql_data);

        return redirect()->route('admin.category_slider.index');
    }
}
