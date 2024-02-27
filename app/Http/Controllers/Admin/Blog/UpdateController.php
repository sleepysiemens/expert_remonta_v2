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
      //dd($req->all());
      $req->merge(['active' => $req->active !== 'on']);
      $req->validate(['src' => 'mimes:jpg,png,jpeg']);
      //$data= $req->all();
      $data= $req->except('search_terms');
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

    public function sendWish(Request $req, Blog $blog) {
      //dd($blog);
      //dd($req->all());
      $blog->update($req->all());
      return redirect(parse_url($_SERVER['HTTP_REFERER'])['path']);
    }
}
