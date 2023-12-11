<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;


class StoreController extends Controller
{
    public function index()
    {
        $data=request()->validate(['username'=>'required|string', 'rating'=>'required|integer', 'text'=>'required|max:1000']);
        Review::create($data);

        return redirect()->route('admin.review.index');
    }
}
