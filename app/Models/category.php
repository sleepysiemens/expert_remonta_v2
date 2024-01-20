<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class category extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getTable()  {
      // Your logic to determine the table name
      return env('APP_CITY') === 'Астана' ? 'categories' : 'categories_almaty';
      //return env('APP_CITY') === 'Астана' ? 'categories_almaty' : 'categories';
    }

    /*public function service(): HasOne{
        return $this->hasOne(Service::class);
    }*/

    public function service(): BelongsTo
    {
        return $this->belongsTo(service::class);
    }

    public function slides(): HasMany
    {
        return $this->hasMany(CategoryImage::class);
    }

}
