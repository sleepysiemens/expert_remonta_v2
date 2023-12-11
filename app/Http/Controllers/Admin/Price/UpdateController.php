<?php

namespace App\Http\Controllers\Admin\Price;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\price;



class UpdateController extends Controller
{
    public function __invoke(Price $price)
    {
        $data=request()->validate(['title'=>'required|string', 'unit'=>'required|string', 'price'=>'required', 'category'=>'required|string']);
        $price->update($data);

        return redirect()->route('admin.price.show', $price->id); 
    }
}
