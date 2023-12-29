<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;


class StoreController extends Controller
{
    public function index()
    {
        $data=request()->validate(['name'=>'required|string', 'link'=>'required|string']);
        Contact::create($data);

        return redirect()->route('admin.contact.index');
    }
}
