<?php

namespace App\Http\Controllers\Admin\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sale;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data=request()->validate(['title'=>'required|string', 'src'=>'required']);
        $sql_data=['title'=>request()->title, 'src'=>(request()->title).'-image.img'];

        $file = request()->file('src');
        $file->move(public_path() . '/img/sales/',request()->title.'-image.img');
        
        Sale::create($sql_data);

        return redirect()->route('admin.sale.index'); 
    }
}