<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;


class DestroyController extends Controller
{
    public function index(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blog.index');
    }
}
