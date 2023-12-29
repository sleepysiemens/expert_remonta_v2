<?php

namespace App\Http\Controllers\Admin\Price;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\price;


class StoreController extends Controller
{
    public function index()
    {
        $data=request()->all();
        Price::create($data);
        $prices=Price::all();

        return redirect()->route('admin.price.index');
    }
}
