<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class StoreController extends Controller
{
    public function index(Request $req)
    {
        $data=$req->validate(['name'=>'required|string', 'email'=>'required|string', 'role'=>'required|string']);

        $password = Str::random(10);

        $data['password'] = Hash::make($password);
        //dd($data);

        User::create($data);

        $user = User::where(['name' => $req->name])->first();
        //dd($user);

        return redirect()->route('admin.user.index')->with('msg', "Пароль созданного пользователя: $password Сохраните пароль!");
    }

    public function regenPass(Request $req, User $user) {
        //dd($user);
        $password = Str::random(10);
        $user->password = Hash::make($password);
        $user->update();
        return redirect()->route('admin.user.index')->with('msg', "Новый пароль пользователя $user->name: $password Сохраните пароль!");
    }
}
