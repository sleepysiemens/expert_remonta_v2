<?php

namespace App\Http\Controllers\Admin\Service_slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ServiceImage;


class UpdateController extends Controller
{
    public function index(ServiceImage $service_slider)
    {
        if(request()->hasFile('src'))
        {
            $file = request()->file('src');
            $file->move(public_path() . '/img/service_slider/'.request()->service_id.'/',request()->title.'-image.img');
        }
        else
            $sql_data=['title'=>request()->title, 'url'=>request()->url, 'description'=>request()->description, 'service_id'=>request()->service_id];

        $service_slider->update($sql_data);

        return redirect()->route('admin.service_slider.index');
    }
}
