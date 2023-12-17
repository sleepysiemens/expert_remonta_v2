<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\service;


class UpdateController extends Controller
{
    public function index(Service $service)
    {
        if(request()->hasFile('src'))
        {
            $file = request()->file('src');
            $file->move(public_path() . '/img/services/',request()->title.'-image.img');
            $sql_data=request();
        }
        else
            $sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz, 'url'=>request()->url, 'description_ru'=>request()->description_ru, 'description_kz'=>request()->description_kz];


        $service->update($sql_data);

        return redirect()->route('admin.service.show', $service->id);
    }
}
