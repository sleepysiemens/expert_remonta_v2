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

    public function update(Request $req, Block $block)
    {
        //dd($req->all());
      $block->update($req->except('files'));

      return redirect()->route('admin.blocks.index');
    }

    public function destroy(Block $block)
    {
        $block->delete();
        return redirect()->route('admin.blocks.index');
    }
}
