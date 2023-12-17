<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;


class UpdateController extends Controller
{
    public function index(Blog $blog)
    {
        if(request()->hasFile('src'))
        {
            $name=rand().'.img';
            $file = request()->file('src');
            $file->move(public_path() . '/img/blog/',$name);
            $sql_data=['title_ru'=>request()->title_ru, 'url'=>request()->url, 'description_ru'=>request()->description_ru, 'src'=>$name, 'title_kz'=>request()->title_kz, 'description_kz'=>request()->description_kz];
        }
        else
            $sql_data=['title_ru'=>request()->title_ru, 'url'=>request()->url, 'description_ru'=>request()->description_ru, 'title_kz'=>request()->title_kz, 'description_kz'=>request()->description_kz];


        $blog->update($sql_data);

        return redirect()->route('admin.blog.show', $blog->id);
    }
}
