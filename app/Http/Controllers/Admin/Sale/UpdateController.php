<?php

namespace App\Http\Controllers\Admin\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sale;


class UpdateController extends Controller
{
    public function index(Sale $sale)
    {
        if(request()->hasFile('src'))
        {
            $file = request()->file('src');
            $file->move(public_path() . '/img/sales/',request()->title.'-image.img');
            $sql_data=request();
        }
        else
            $sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz, 'period'=>request()->period, 'percent'=>request()->percent, 'description_ru'=>request()->description_ru, 'description_kz'=>request()->description_kz];


        $sale->update($sql_data);

        return redirect()->route('admin.sale.show', $sale->id);
    }
}
