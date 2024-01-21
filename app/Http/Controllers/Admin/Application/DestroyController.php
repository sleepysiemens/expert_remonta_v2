<?php

namespace App\Http\Controllers\Admin\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Application;


class DestroyController extends Controller
{
    public function index(Application $application)
    {
        $application->delete();
        return redirect()->route('admin.application.index');
    }
}
