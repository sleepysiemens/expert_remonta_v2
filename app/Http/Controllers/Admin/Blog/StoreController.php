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
        $data=request()->validate(['title'=>'required|string', 'url'=>'required|string', 'description'=>'required|max:1000', 'src'=>'required']);
        $sql_data=['title'=>request()->title, 'url'=>request()->url, 'description'=>request()->description, 'src'=>$name];

        $file = request()->file('src');
        $file->move(public_path() . '/img/blog/',$name);

        Blog::create($sql_data);

        return redirect()->route('admin.blog.index');
    }
}
