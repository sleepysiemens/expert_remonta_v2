<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Sale extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getTable()  {
      return config('app.city') === 'Астана' ? 'sales' : 'sales_almaty';
    }

    public function scopeActive(Builder $query): void
    {
      $query->where(['active' => true]);
    }

    public function scopeArchived(Builder $query): void
    {
      $query->where(['active' => false]);
    }

    public function scopeFiltered(Builder $query): void
    {
      if(request()->query('archive')) $query->where(['active' => false]);
      else $query->where(['active' => true]);
    }

}
