<?php

namespace App\Http\Controllers\Admin\Category_slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CategoryImage;


class DestroyController extends Controller
{
    public function index(CategoryImage $category_slider)
    {
        $category_slider->delete();
        return redirect()->route('admin.category_slider.index');
    }
}
