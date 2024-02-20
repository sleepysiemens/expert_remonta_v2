<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Blog;


class StoreController extends Controller
{
    public function index(Request $req)
    {
      //dd($req->all());
      $req->merge(['active' => $req->active !== 'on']);
      $req->validate([
        'src' => 'mimes:jpg,png,jpeg',
      ]);
      $data = $req->all();

        $file = $req->file('src');
        $name= Str::random(8) . "_" . $file->hashName();
        $file->move(public_path() . '/img/blog/', $name);
        //\App\Events\ImageUploaded::dispatch(public_path() . '/img/blog/', $name, [768]);
        unset($data['src']);
        $data['src'] = $name;

        Blog::create($data);

        /*DB::transaction(function() use ($data, $req) {
            Blog::create($data);
          $cat = Category::where(['url' => $data['url']])->with('service')->first();
        });*/

        return redirect()->route('admin.blog.index')->with('msg', 'Новая статья в блог успешно добавлена');
    }
}
