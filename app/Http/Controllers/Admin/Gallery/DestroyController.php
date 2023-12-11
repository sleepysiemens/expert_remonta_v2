<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\gallery;


class DestroyController extends Controller
{
    public function index(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index');
    }
}
