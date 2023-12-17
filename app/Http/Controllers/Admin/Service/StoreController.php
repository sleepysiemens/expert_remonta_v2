<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\service;


class StoreController extends Controller
{
    public function index()
    {
        $sql_data=request();

        $file = request()->file('src');
        $file->move(public_path() . '/img/services/',request()->title.'-image.img');

        Service::create($sql_data);

        return redirect()->route('admin.service.index');
    }
}
