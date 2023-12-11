<?php

namespace App\Http\Controllers\Admin\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sale;


class UpdateController extends Controller
{
    public function __invoke(Sale $sale)
    {
        $data=request()->validate(['title'=>'required|string', 'src']);

        if(request()->hasFile('src'))
        {
            $file = request()->file('src');
            $file->move(public_path() . '/img/sales/',request()->title.'-image.img');
            $sql_data=['title'=>request()->title, 'src'=>(request()->title).'-image.img'];
        }
        else
            $sql_data=['title'=>request()->title];


        $sale->update($sql_data);

        return redirect()->route('admin.sale.show', $sale->id); 
    }
}