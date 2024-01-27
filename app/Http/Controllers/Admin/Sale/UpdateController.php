<?php

namespace App\Http\Controllers\Admin\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Sale;


class UpdateController extends Controller
{
    public function index(Request $req, Sale $sale)
    {
        if(request()->hasFile('src'))
        {
          @unlink(dirname(__FILE__) . "/../../../../../public/img/sales/" . $sale->src);
            $file = request()->file('src');
            $name= Str::random(8) . "_" . $file->hashName();
            $file->move(public_path() . '/img/sales/', $name);

            $sql_data=$req->except('src');
            $sql_data['src'] = $name;
        }
        else
            $sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz, 'period'=>request()->period, 'percent'=>request()->percent, 'description_ru'=>request()->description_ru, 'description_kz'=>request()->description_kz];


        $sale->update($sql_data);

        return redirect()->route('admin.sale.show', $sale->id);
    }
}
