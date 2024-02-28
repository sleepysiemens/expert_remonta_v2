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
        //$blogs = BlogCategory::whereNull('parent_id')->get();
        //$seos=Seo::query()->where('page','=','blog')->get();
        $page='blog';
        // получим последние 10 опубликованных постов
        $posts = Blog::active()->latest()->with('category.parent.parent')->paginate(10);
        //dd($posts[0]->short);
        $seo = Seo::where(['page' => $page])->first();

        //return view('blog.index', compact(['blogs', 'page']));
        return view('blog.index', compact(['posts', 'page', 'seo']));
    }

    public function search(Request $req)
    {
        //dd($req->all());
        $posts = Blog::where('title_ru', 'LIKE', "%$req->q%")
        ->orWhere('short_title_ru', 'LIKE', "%$req->q%")
        ->active()
        ->with('category.parent.parent')
        ->paginate(10);
        //dd(count($posts));
        $page='blog';
        $seo = Seo::where(['page' => $page])->first();
        $q = $req->q;

        return view('blog.index', compact(['posts', 'page', 'seo', 'q']));
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
        // короче тут надо собрать id вложенных категорий
        $catsIds = [];
        if(!$child && !$child2) {
            $prCategory = BlogCategory::where(['id' => $parentCategory->id])->with('childs.childs')
            ->first();
            foreach($prCategory->childs as $ch) {
                $catsIds[] = $ch->id;
                foreach($ch->childs as $c) $catsIds[] = $c->id;
            }
        } elseif($child && !$child2) {
            $catsIds[] = $child->id;
            foreach($child->childs as $c) $catsIds[] = $c->id;
        } elseif($child2) {
            $catsIds[] = $child2->id;
        }

        $posts = Blog::active()->latest()->whereIn('category_id', $catsIds)
        ->with('category.parent.parent')->paginate(10);
        //dd($posts);
        //dd($child);
        return view('blog.category', compact('parentCategory', 'childCategory', 'category', 'child', 'child2', 'page', 'posts'));
    }

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
            //->active()
            ->select('id', 'url', 'short_title_ru', 'short_title_kz', 'category_id')
            ->with('category.parent.parent')
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

    public function showDeepPost(BlogCategory $category, 
        BlogCategory $child,  
        BlogCategory $child2,  
        Blog $post) {
            if(!auth()->id() && !$post->active) abort(404);
            $page = 'blogpost';
            $posts = Blog::whereHas('category', function($q) use ($child2, $post){
                $q->where('id', '=', $child2->id);
            })//->active()
            ->select('id', 'url', 'short_title_ru', 'short_title_kz', 'category_id')
            ->with('category.parent.parent')
            ->get();
            $postIndex = $posts->search(function($p) use($post) {
                return $p->id === $post->id;
            });
            $prevPost = $postIndex-1 > -1 ? $posts[$postIndex-1] : null;
            $nextPost = $postIndex < count($posts) - 1 ? $posts[$postIndex+1] : null;
            return view('blog.post', compact(
                'category', 'child', 'child2', 'post', 'page', 'posts', 'prevPost', 'nextPost'
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
