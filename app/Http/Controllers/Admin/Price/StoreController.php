<?php

namespace App\Http\Controllers\Admin\Price;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\price;


class StoreController extends Controller
{
    public function __invoke()
    {
        $data=request()->validate(['title'=>'required|string', 'unit'=>'required|string', 'price'=>'required', 'category'=>'required|string']);
        Price::create($data);
        $prices=Price::all();

        return redirect()->route('admin.price.index'); 
    }
}
