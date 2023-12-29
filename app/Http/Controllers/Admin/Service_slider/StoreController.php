<?php

namespace App\Http\Controllers\Admin\Service_slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ServiceImage;


class StoreController extends Controller
{
    public function index()
    {
        $name=request()->file('src')->getClientOriginalName();
        $sql_data=['src'=>$name, 'service_id'=>request()->service_id];

        $file = request()->file('src');
        $file->move(public_path() . '/img/service_slider/'.request()->service_id.'/',$name);

        ServiceImage::create($sql_data);

        return redirect()->route('admin.service_slider.index');
    }
}
