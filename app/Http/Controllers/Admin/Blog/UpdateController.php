<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;


class UpdateController extends Controller
{
    public function index(Blog $blog)
    {
        $data=request()->validate(['title'=>'required|string', 'url'=>'required|string', 'description'=>'required|max:1000', 'src']);

        if(request()->hasFile('src'))
        {
            $name=rand().'.img';
            $file = request()->file('src');
            $file->move(public_path() . '/img/blog/',$name);
            $sql_data=['title'=>request()->title, 'url'=>request()->url, 'description'=>request()->description, 'src'=>$name];
        }
        else
            $sql_data=['title'=>request()->title, 'url'=>request()->url, 'description'=>request()->description];


        $blog->update($sql_data);

        return redirect()->route('admin.blog.show', $blog->id);
    }
}
