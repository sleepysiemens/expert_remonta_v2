<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\category;


class DestroyController extends Controller
{
    public function index(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
