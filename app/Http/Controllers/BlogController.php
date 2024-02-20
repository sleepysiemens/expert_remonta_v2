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
    public function index(Blog $blog)
    {
        $Abouts=About::all();
        $WhyCards=WhyCard::all();
        $reviews=Review::all();

        $seos=Seo::query()->where('page','=','contacts')->get();
        $page='contacts';

        return view('blog.index', compact(['blog','reviews', 'Abouts', 'WhyCards', 'page', 'seos']));
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

    public function showPost(BlogCategory $category, 
        BlogCategory $child, 
        BlogCategory $child2, 
        Blog $post) {
            dd($post);
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
