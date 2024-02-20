<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;


class DestroyController extends Controller
{
    public function index(Blog $blog)
    {
        @unlink(public_path() . "/img/blog/" . $blog->src);
        $blog->delete();
        return redirect()->route('admin.blog.index');
    }
}
