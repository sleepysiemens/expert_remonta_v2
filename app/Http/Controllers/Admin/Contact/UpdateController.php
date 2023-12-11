<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\contact;


class UpdateController extends Controller
{
    public function index(Contact $contact)
    {
        $data=request()->validate(['name'=>'required|string', 'link'=>'required|string']);
        $contact->update($data);


        return redirect()->route('admin.contact.show', $contact->id);
    }
}
