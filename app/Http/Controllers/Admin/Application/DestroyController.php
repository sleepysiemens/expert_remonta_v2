<?php

namespace App\Http\Controllers\Admin\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\application;


class DestroyController extends Controller
{
    public function index(application $application)
    {
        $application->delete();
        return redirect()->route('admin.applications.index');
    }
}
