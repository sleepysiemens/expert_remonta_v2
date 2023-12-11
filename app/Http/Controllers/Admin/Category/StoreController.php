<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\category;


class StoreController extends Controller
{
    public function index()
    {
        $data=request()->validate(['title'=>'required|string', 'url'=>'required|string', 'description'=>'required|max:1000', 'service_id'=>'required|integer', 'src'=>'required']);
        $sql_data=['title'=>request()->title, 'url'=>request()->url, 'description'=>request()->description, 'src'=>(request()->title).'-image.img', 'service_id'=>request()->service_id];

        $file = request()->file('src');
        $file->move(public_path() . '/img/categories/',request()->title.'-image.img');

        Category::create($sql_data);
        //$categories=Category::all();

        return redirect()->route('admin.category.index');
    }
}
