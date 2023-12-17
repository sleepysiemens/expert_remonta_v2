<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\category;


class StoreController extends Controller
{
    public function index()
    {
        $sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz, 'url'=>request()->url, 'description_ru'=>request()->description_ru, 'description_kz'=>request()->description_kz, 'src'=>(request()->title).'-image.img', 'service_id'=>request()->service_id];

        $file = request()->file('src');
        $file->move(public_path() . '/img/categories/',request()->title.'-image.img');

        Category::create($sql_data);
        //$categories=Category::all();

        return redirect()->route('admin.category.index');
    }
}
