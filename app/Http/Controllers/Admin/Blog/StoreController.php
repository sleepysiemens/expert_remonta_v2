<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;


class StoreController extends Controller
{
    public function index()
    {
        $name=rand().'.img';
        $sql_data=['title_ru'=>request()->title_ru, 'url'=>request()->url, 'description_ru'=>request()->description_ru, 'src'=>$name, 'title_kz'=>request()->title_kz, 'description_kz'=>request()->description_kz];

        $file = request()->file('src');
        $file->move(public_path() . '/img/blog/',$name);

        Blog::create($sql_data);

        return redirect()->route('admin.blog.index');
    }
}
