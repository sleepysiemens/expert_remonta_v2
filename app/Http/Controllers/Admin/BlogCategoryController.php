<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\Gallery;
use App\Models\BlogCategory;



class BlogCategoryController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $galleries=gallery::all();
        $items=BlogCategory::with('parent')->get();
        //dd($items);

        return view('admin.blog_category.index', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'items']));
    }

    public function create()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=Sale::all();
        $galleries=Gallery::all();
        $items=BlogCategory::whereNull('parent_id')->with('childs.childs')->get();

        return view('admin.blog_category.create', compact('reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'items'));
    }

    public function store(Request $req)
    {
        $data=$req->all();
        if($req->hasFile('thumb')) {
            $file = request()->file('thumb');
            $fileName = $file->hashName();
            $file->move(public_path() . '/img/blog_category/',$fileName);
            unset($data['thumb']);
            $data['thumb'] = $fileName;
        }
        BlogCategory::create($data);

        return redirect()->route('admin.blogCategory.index');
    }

    public function edit(BlogCategory $item)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=Sale::all();
        $galleries=gallery::all();
        $items=BlogCategory::whereNull('parent_id')
        ->whereNot('id', $item->id)
        ->with('childs.childs')->get();

        return view('admin.blog_category.edit', compact(['items', 'reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'item']));
    }

    public function update(Request $req, BlogCategory $item)
    {
        $data=$req->all();
        if($req->hasFile('thumb')) {
            $file = request()->file('thumb');
            $fileName = $file->hashName();
            //dd($fileName);
            $file->move(public_path() . '/img/blog_category/',$fileName);
            unset($data['thumb']);
            $data['thumb'] = $fileName;
            @unlink(public_path() . "/img/blog_category/" . $item->src);
        }
      $item->update($data);

      return redirect()->route('admin.blogCategory.index');
    }

    public function destroy(BlogCategory $item)
    {
        $item->delete();
        @unlink(public_path() . "/img/blog_category/" . $item->src);
        return redirect()->route('admin.blogCategory.index');
    }
}
