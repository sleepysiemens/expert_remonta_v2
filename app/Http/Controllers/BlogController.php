<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\About;
use App\Models\WhyCard;
use App\Models\Seo;
use App\Models\Blog;
use App\Models\BlogCategory;
use Stevebauman\Location\Facades\Location;




class BlogController extends Controller
{
    public function index()
    {
        $blogs = BlogCategory::whereNull('parent_id')->get();
        //$seos=Seo::query()->where('page','=','blog')->get();
        $page='blog';

        return view('blog.index', compact(['blogs', 'page']));
    }

    public function showCategory(BlogCategory $category, BlogCategory $child = null, BlogCategory $child2 = null) {
        //dd($category->childs);
        //dd($child);
        $parentCategory = $category;
        $childCategory = null;
        if($child) {
            $category = $child;
            $childCategory = $child;
        }
        if($child2) {
            $category = $child2;
            $childCategory = $child2;
        }
        $page = 'blogCategory';
        return view('blog.category', compact('parentCategory', 'childCategory', 'category', 'child', 'child2', 'page'));
    }

    /*public function showPost(BlogCategory $category, 
        BlogCategory $child, 
        BlogCategory $child2, 
        Blog $post) {
            dd($post);
    }*/

    public function showPost(BlogCategory $category, 
        BlogCategory $child,  
        Blog $post) {
            //dd(auth()->id());
            //dd($post);
            if(!auth()->id() && !$post->active) abort(404);
            //dd(BlogCategory::has('parent')->doesntHave('parent.parent')->pluck('id'));
            $page = 'blogpost';
            $posts = Blog::whereHas('category', function($q) use ($child, $post){
                $q->where('id', '=', $child->id);
            })//->where('id', '!=', $post->id)
            ->active()
            ->select('id', 'url', 'short_title_ru', 'short_title_kz')
            ->get();
            //dd($posts);
            $postIndex = $posts->search(function($p) use($post) {
                return $p->id === $post->id;
            });
            $prevPost = $postIndex-1 > -1 ? $posts[$postIndex-1] : null;
            $nextPost = $postIndex < count($posts) - 1 ? $posts[$postIndex+1] : null;
            //dd($posts);
            return view('blog.post', compact(
                'category', 'child', 'post', 'page', 'posts', 'prevPost', 'nextPost'
            ));
    }

    /*public function showCategory(BlogCategory $category) {
        //dd($category->childs);
        $page = 'blogCategory';
        return view('blog.category', compact('category', 'page'));
    }
    public function showSubcategory(BlogCategory $category, BlogCategory $child) {
        //dd($category->childs);
        //dd($child);
        $parentCategory = $category;
        $category = $child;
        $page = 'blogSubCategory';
        return view('blog.category', compact('category', 'page', 'child', 'parentCategory'));
    }
    public function showDeepcategory(BlogCategory $category, BlogCategory $child, BlogCategory $child2) { 
        $parentCategory = $category;
        $category = $child2;
        $page = 'blogDeepCategory';
        return view('blog.category', compact('category', 'page', 'child', 'parentCategory'));
    }*/
}
