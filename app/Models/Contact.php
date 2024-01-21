<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getTable()  {
      return env('APP_CITY') === 'Астана' ? 'contacts' : 'contacts_almaty';
    }
}
