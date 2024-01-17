<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;


class UpdateController extends Controller
{
    public function index(Gallery $gallery)
    {
        $data=request()->validate(['title'=>'required|string', 'src'=>'required']);
        $sql_data=['title'=>request()->title, 'src'=>(request()->title).'-image.img'];

        $file = request()->file('src');
        $file->move(public_path() . '/img/gallery/',request()->title.'-image.img');

        $gallery->update($sql_data);

        return redirect()->route('admin.gallery.show', $gallery->id);
    }
}
