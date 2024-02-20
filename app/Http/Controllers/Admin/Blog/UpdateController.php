<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Blog;


class UpdateController extends Controller
{
    public function index(Request $req, Blog $blog)
    {
      $req->merge(['active' => $req->active !== 'on']);
      $req->validate(['src' => 'mimes:jpg,png,jpeg']);
      $data= $req->all();
      if(request()->hasFile('src')){
            $file = request()->file('src');
            $name= Str::random(8) . "_" . $file->hashName();
            $file->move(public_path() . '/img/blog/', $name);
            //\App\Events\ImageUploaded::dispatch(public_path() . '/img/blog/', $name, [768]);
            unset($data['src']);
            @unlink(public_path() . "/img/blog/" . $blog->src);
            $data['src'] = $name;
      }


      $blog->update($data);

      return redirect()->route('admin.blog.show', $blog->id);
    }
}
