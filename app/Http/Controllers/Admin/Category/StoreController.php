<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Models\category;


class StoreController extends Controller
{
    public function index()
    {
      //dd(request()->all());
        $data=request()->all();

        $file = request()->file('src');
        $name= Str::random(8) . "_" . $file->hashName();
        //dd($name);
        //$file->move(public_path() . '/img/categories/',request()->title.'-image.img');
        $file->move(public_path() . '/img/categories/', $name);
        //$file->move(public_path() . '/img/categories/', "123.jpg");
        unset($data['src']);
        //$data['src']=request()->title.'-image.img';
        $data['src'] = $name;

        Category::create($data);
        //$categories=Category::all();

        return redirect()->route('admin.category.index');
    }
}
