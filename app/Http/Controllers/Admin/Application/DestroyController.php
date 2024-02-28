<?php

namespace App\Http\Controllers\Admin\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Application;


class DestroyController extends Controller
{
    public function index(Application $application)
    {
        //dd(Storage::delete("resumes/$application->resume_file"));
        @unlink(base_path() . "/storage/app/$application->resume_file");
        $application->delete();
        return redirect()->route('admin.application.index');
    }
}
