<?php

namespace App\Http\Controllers\Admin\Service_slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ServiceImage;


class DestroyController extends Controller
{
    public function index(ServiceImage $service_slider)
    {
        $service_slider->delete();
        return redirect()->route('admin.service_slider.index');
    }
}
