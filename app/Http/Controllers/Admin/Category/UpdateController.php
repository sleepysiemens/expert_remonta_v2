<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\category;


class UpdateController extends Controller
{
    public function index(Category $category)
    {
         $data=request()->all();
         //dd($data);
        if(request()->hasFile('src'))
        {
            $file = request()->file('src');
            $file->move(public_path() . '/img/categories/',request()->title.'-image.img');
            unset($data['src']);
            $data['src']=request()->title.'-image.img';
        }


        $category->update($data);

        return redirect()->route('admin.category.show', $category->id);
    }
}
