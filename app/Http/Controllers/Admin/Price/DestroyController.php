<?php

namespace App\Http\Controllers\Admin\Price;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\price;


class DestroyController extends Controller
{
    public function index(Price $price)
    {
        $price->delete();
        return redirect()->route('admin.price.index');
    }
}
