<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data=request()->validate(['name'=>'required|string', 'email'=>'required|string', 'role'=>'required|string']);

        User::create($data);

        return redirect()->route('admin.user.index'); 
    }
}