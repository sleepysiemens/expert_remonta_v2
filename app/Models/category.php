<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class category extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getTable()  {
      // Your logic to determine the table name
      return config('app.city') === 'Астана' ? 'categories' : 'categories_almaty';
      //return config('app.city') === 'Астана' ? 'categories_almaty' : 'categories';
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
