<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Gallery;

class StoreController extends Controller
{
    public function index(Request $req)
    {
      //dd(filesize(dirname(__FILE__) . "/../../../../../public/img/bg.png"));
      //dd($req->all());
        //dd(\App\Models\CategoryImage::first());
        $data = $req->validate(['src'=>'required']);
        

        $file = $req->file('src');
        $name= Str::random(8) . "_" . $file->hashName();
        $file->move(public_path() . '/img/gallery/', $name);

        $sql_data = ['title'=>$req->title, 'src'=> $name];
        Gallery::create($sql_data);

        return redirect()->route('admin.gallery.index');
    }
}
