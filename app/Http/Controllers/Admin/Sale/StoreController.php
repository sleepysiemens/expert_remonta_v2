<?php

namespace App\Http\Controllers\Admin\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sale;

class StoreController extends Controller
{
    public function index()
    {
        $sql_data=request()->all();

        $file = request()->file('src');
        $file->move(public_path() . '/img/sales/',request()->title.'-image.img');

        Sale::create($sql_data);

        return redirect()->route('admin.sale.index');
    }
}
