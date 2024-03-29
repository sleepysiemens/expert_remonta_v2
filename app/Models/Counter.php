<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function getTable()  {
        return config('app.city') === 'Астана' ? 'counters' : 'counters_almaty';
    }
}
