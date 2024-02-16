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
use App\Models\Block;

use Illuminate\Support\Str;



class BlocksController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $galleries=gallery::all();
        $items=Block::all();

        return view('admin.block.index', compact(['reviews', 'questions', 'services', 'categories', 'sales', 'galleries', 'items']));
    }

    public function create()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=Sale::all();
        $galleries=Gallery::all();

        return view('admin.block.create', compact('reviews', 'questions', 'services', 'categories', 'sales', 'galleries'));
    }

    public function store(Request $req)
    {
        Block::create($req->all());

        return redirect()->route('admin.blocks.index');
    }

    public function edit(Block $block)
    {
        $questions=Question::all();
        $reviews=Review::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=Sale::all();
        $galleries=gallery::all();

        return view('admin.block.edit', compact(['block', 'reviews', 'questions', 'services', 'categories', 'sales', 'galleries']));
    }

    /*public function update(Request $req, Block $block)
    {
        //dd($req->all());
      $block->update($req->except('files'));

      return redirect()->route('admin.blocks.index');
    }*/

    public function update(Request $request, Block $block)
    {
        //dd($request->all());
        /*$this->validate($request, [
             'name' => 'required',
             'code' => 'required'
        ]);*/
 
       $code = config('app.city') === 'Астана' ? $request->code : $request->code_almaty;
       $dom = new \DomDocument();
       $html = mb_convert_encoding( $code, 'HTML-ENTITIES', 'UTF-8' );
       //$dom->loadHtml($code, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
       $dom->loadHtml($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
       //dd($dom);
       $imageFile = $dom->getElementsByTagName('img');
       //dd($imageFile);
 
       foreach($imageFile as $item => $image){
           $data = $image->getAttribute('src');
           //dd($data);
           preg_match('/data:image\/([a-z]*)/u', $data, $matches);
           if(!isset($matches[1])) continue;
           $ext = $matches[1];
           list($type, $data) = explode(';', $data);
           list(, $data)      = explode(',', $data);
           $imgeData = base64_decode($data);
           $str= Str::random(8);
           $folder = "/img/summernote/" . date('Y') . '/' . date('m');
           $image_name= $folder . '/' . $str.".$ext";
           //dd($image_name);
           $path = public_path() . $image_name;
           if (!is_dir(public_path() . $folder)) {
            // dir doesn't exist, make it
            //dd(public_path() . $folder);
            mkdir(public_path() . $folder, 0777, true);
          }
           if(!file_exists($path)) file_put_contents($path, $imgeData);
           
           $image->removeAttribute('src');
           $image->setAttribute('src', $image_name);
           $image->setAttribute('alt', $image->getAttribute('data-filename'));
        }
 
       $code = $dom->saveHTML();
       //dd($code);
       $block->name = $request->name;
       $block->code = $code;
       $block->save();
 
       //dd($block);
       return redirect()->route('admin.blocks.index');
    }

    public function destroy(Block $block)
    {
        $block->delete();
        return redirect()->route('admin.blocks.index');
    }
}
