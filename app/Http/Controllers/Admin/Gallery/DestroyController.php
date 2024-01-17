<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;


class DestroyController extends Controller
{
    public function index(Gallery $gallery)
    {
      @unlink(dirname(__FILE__) . "/../../../../../public/img/gallery/" . $gallery->src);
        $gallery->delete();
        return redirect()->route('admin.gallery.index');
    }
}
