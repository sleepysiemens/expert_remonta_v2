<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\CategoryImage;
use App\Models\Sale;
use App\Models\Application;
use App\Models\Seo;


class IndexController extends Controller
{
    public function index()
    {
      //dd(\App\Models\City::all());
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::filtered()->with('service')->with('slides')->get();
        $sales=sale::all();

        foreach($categories as $c) {
          //$serviceSlug = $c->service->url;
          //$c->seo = Seo::where('page', '=', "uslugi/$serviceSlug/$c->url")->first();
        }
        //dd($categories[0]);

        return view('admin.page.index', compact(['reviews', 'questions', 'services', 'categories', 'sales']));
    }

    public function show(Category $category)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
	$sales=Sale::all();
        $service=Service::query()->where('id', '=' ,$category->service_id)->get();
        $serviceSlug = $category->service->url;
        //$category->seo = Seo::where('page', '=', "uslugi/$serviceSlug/$category->url")->first();

        $hasBigSize = false;
        foreach($category->slides as $idx => $slide) {
          $category->slides[$idx]->size = round(filesize(dirname(__FILE__) . "/../../../../../public/img/category_slider/"."$category->id/".$slide->src) / 1024);
          if($category->slides[$idx]->size > 250) $hasBigSize = true;
        }
        //dd($category->slides);

        return view('admin.page.show', compact(['category' , 'service', 'reviews', 'questions', 'services', 'categories', 'sales', 'hasBigSize']));
    }

    public function create()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        return view('admin.page.create', compact(['reviews', 'questions', 'services', 'categories', 'sales']));
    }

    public function store(Request $req)
    {
      //dd($req->all());
      //dd($req->file("file")[1]);
      $req->merge(['active' => $req->active !== 'on']);
      $req->validate([
        'src' => 'mimes:jpg,bmp,png,gif,jpeg,avif,jfif',
        'slides.*' => 'mimes:jpg,bmp,png,gif,jpeg,avif,jfif',
      ]);
        $data= $req->except(['slides']);
        //$seoData = $req->only(['seo_ru', 'seo_kz', 'meta_ru', 'meta_kz']);

        $file = $req->file('src');
        //$name= date("Y-m-dH:i:s") . "_" . $file->hashName();
        $name= Str::random(8) . "_" . $file->hashName();
        //$file->move(public_path() . '/img/categories/',request()->title.'-image.img');
        $file->move(public_path() . '/img/categories/', $name);
        unset($data['src']);
        //$data['src']=request()->title.'-image.img';
        $data['src'] = $name;

        DB::transaction(function() use ($data, $req) {
          Category::create($data);
          $cat = Category::where(['url' => $data['url']])->with('service')->first();
          //$seoData['page'] = "uslugi/" . $cat->service->url . "/" . $cat->url;
          //Seo::create($seoData);
          if(isset($req->slides)) {
            foreach($req->slides as $idx => $slide) {
              $file = $req->file("slides")[$idx];
              $name = Str::random(8) . "_" . $file->hashName();
              $file->move(public_path() . '/img/category_slider/'.$cat->id, $name);
              CategoryImage::create(['src' => $name, 'category_id' => $cat->id]);
            }
          }
        });

        return redirect()->route('admin.page.index')->with('msg', 'Новая страница услуги успешно добавлена');
    }

    public function edit(Category $category)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $service=service::query()->where('id','=',$category->service_id)->get();
        //$seos=Seo::where('page','=','uslugi/'.$category->service->url.'/'.$category->url)->get();

        return view('admin.page.edit', compact(['category', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }

    public function update(Request $req, Category $category)
    {
      //$req->merge(['active' => $req->active != 1 && $req->active !== null]);
      $req->merge(['active' => $req->active !== 'on']);
      $req->validate([
        'src' => 'mimes:jpg,bmp,png,gif,jpeg,avif,jfif',
        'slides.*' => 'mimes:jpg,bmp,png,gif,jpeg,avif,jfif',
      ]);
      //dd($req->all());
      $data= $req->except(['slides']);
      //$seoData = $req->only(['seo_ru', 'seo_kz', 'meta_ru', 'meta_kz']);
      if(request()->hasFile('src')){
            $file = request()->file('src');
            $name= Str::random(8) . "_" . $file->hashName();
            $file->move(public_path() . '/img/categories/', $name);
            unset($data['src']);
            //$data['src']=request()->title.'-image.img';
            $data['src'] = $name;
      }


      DB::transaction(function() use ($data, $category, $req) {
        $category->update($data);
        //$seo = Seo::where('page','=','uslugi/'.$category->service->url.'/'.$category->url)->first();
        //$seo->update($seoData);
        if(isset($req->slides)) {
          foreach($req->slides as $idx => $slide) {
            $file = $req->file("slides")[$idx];
            $name = Str::random(8) . "_" . $file->hashName();
            $file->move(public_path() . '/img/category_slider/'.$category->id, $name);
            CategoryImage::create(['src' => $name, 'category_id' => $category->id]);
          }
        }
      });

        return redirect()->route('admin.page.show', $category->id);
    }

    public function destroy(Category $category)
    {
      //Storage::deleteDirectory(public_path() . '/img/category_slider/'.$category->id);
      deleteDirectory(dirname(__FILE__) . "/../../../../../public/img/category_slider/" . $category->id);
      //dd('ok');
      //$seo = Seo::where('page','=','uslugi/'.$category->service->url.'/'.$category->url)->first();
      //$seo->delete();
      $slides = CategoryImage::where(['category_id' => $category->id])->delete();
      $category->delete();
        return redirect()->route('admin.page.index')->with('msg', 'Страница услуги успешно удалена вместе с SEO инфой и слайдами');
    }

    public function destroySlider(CategoryImage $category_slider) {
      //dd($category_slider);
      @unlink(dirname(__FILE__) . "/../../../../../public/img/category_slider/" . $category_slider->category->id . "/" . $category_slider->src);
      $category_slider->delete();
      return redirect()->route('admin.page.show', $category_slider->category_id)->with('msg', 'Слайд удален');
    }

    public function destroySliderAjax(CategoryImage $category_slider) {
      @unlink(dirname(__FILE__) . "/../../../../../public/img/category_slider/" . $category_slider->category->id . "/" . $category_slider->src);
      $category_slider->delete();
      return 'ok';
    }
}
