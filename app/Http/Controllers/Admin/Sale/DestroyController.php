<?php

namespace App\Http\Controllers\Admin\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sale;


class DestroyController extends Controller
{
    public function index(Sale $sale)
    {
      @unlink(dirname(__FILE__) . "/../../../../../public/img/sales/" . $sale->src);
        $sale->delete();
        return redirect()->route('admin.sale.index');
    }
}
