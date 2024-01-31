<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\service;


class DestroyController extends Controller
{
    public function index(Service $service)
    {
        @unlink(dirname(__FILE__) . "/../../../../../public/img/services/" . $service->src);
        $service->delete();
        return redirect()->route('admin.service.index');
    }
}
