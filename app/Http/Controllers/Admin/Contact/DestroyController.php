<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\contact;


class DestroyController extends Controller
{
    public function index(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.index');
    }
}
