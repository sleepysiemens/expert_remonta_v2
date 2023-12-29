<?php

namespace App\Http\Controllers\Admin\Price;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\price;



class UpdateController extends Controller
{
    public function index(Price $price)
    {
        $data=request()->all();
        //dd($data);
        $price->update($data);

        return redirect()->route('admin.price.show', $price->id);
    }
}
