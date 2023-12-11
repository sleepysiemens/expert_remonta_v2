<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\gallery;

class StoreController extends Controller
{
    public function index()
    {
        $data=request()->validate(['src'=>'required']);
        $sql_data=['title'=>request()->title, 'src'=>(request()->title).'-image.img'];

        $file = request()->file('src');
        $file->move(public_path() . '/img/gallery/',request()->title.'-image.img');

        Gallery::create($sql_data);

        return redirect()->route('admin.gallery.index');
    }
}
