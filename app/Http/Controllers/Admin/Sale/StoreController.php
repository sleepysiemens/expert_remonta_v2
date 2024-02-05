<?php

namespace App\Http\Controllers\Admin\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Sale;
//use Intervention\Image\Facades\Image as ResizeImage;
use Intervention\Image\ImageManager;
//use App\Events\ImageUploaded;

class StoreController extends Controller
{
    public function index(Request $req)
    {
        $req->merge(['active' => $req->active !== 'on']);
        $sql_data=request()->all();
        //dd($sql_data);

        $file = request()->file('src');
        $name= Str::random(8) . "_" . $file->hashName();
        $file->move(public_path() . '/img/sales/', $name);
        \App\Events\ImageUploaded::dispatch(public_path() . '/img/sales/', $name);
        unset($sql_data['src']);
        $sql_data['src'] = $name;

        Sale::create($sql_data);

        return redirect()->route('admin.sale.index');
    }
}
