<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\category;


class StoreController extends Controller
{
    public function index()
    {
        $data=request()->all();

        $file = request()->file('src');
        $file->move(public_path() . '/img/categories/',request()->title.'-image.img');
        unset($data['src']);
        $data['src']=request()->title.'-image.img';

        Category::create($data);
        //$categories=Category::all();

        return redirect()->route('admin.category.index');
    }
}
