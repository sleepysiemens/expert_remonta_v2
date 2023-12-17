<?php

namespace App\Http\Controllers\Admin\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sale;


class DestroyController extends Controller
{
    public function index(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('admin.sale.index');
    }
}
