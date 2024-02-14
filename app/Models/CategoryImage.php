<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryImage extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getTable()  {
      return config('app.city') === 'Астана' ? 'category_images' : 'category_images_almaty';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

}
