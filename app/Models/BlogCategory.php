<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogCategory extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function childs(): HasMany{
        return $this->hasMany(BlogCategory::class, 'parent_id', 'id');
    }
    public function child2s(): HasMany{
        return $this->hasMany(BlogCategory::class, 'parent_id', 'id');
    }
    public function children(): HasMany{
        return $this->hasMany(BlogCategory::class, 'parent_id', 'id');
    }

    public function posts(): HasMany{
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class);
    }

}
