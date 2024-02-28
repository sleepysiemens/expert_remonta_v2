<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $appends = ['short'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function getTable()  {
      return config('app.city') === 'Астана' ? 'blogs_astana' : 'blogs';
    }

    /*public function resolveRouteBinding($value, $field = null) {
        //dd(auth()->id());
        return !(auth()->id())
        ? $this->where([$field => $value, 'active' => true])->firstOrFail()
        : $this->where([$field => $value])->firstOrFail();
    }*/

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

    // сгенерировать параметры только в виде строки, для сайтмапа, это параметр string
    public function genRouteParams($string = false) {
        $params = [];
        if(isset($this->category->parent->parent->url)) {
            $params[]= $this->category->parent->parent->url;
        }
        if(isset($this->category->parent->url)) {
            $params[]= $this->category->parent->url;
        }
        $params[]= $this->category->url;
        $params[]= $this->url;
        return !$string ? $params : implode('/', $params);
    }

    public function genCategoryRouteParams($full = false) {
      $params = [];
      if(isset($this->category->parent->parent->url)) {
          $params[]= $this->category->parent->parent->url;
      }
      if(isset($this->category->parent->url)) {
          $params[]= $this->category->parent->url;
      }
      if($full) $params[]= $this->category->url;
      return $params;
  }

    public function getShortAttribute() {
      $val = db_translate_return($this->description_ru, $this->description_kz);
      $val = strip_tags($val);
      $val = mb_substr($val, 0, 150);
      //dd($val);
      return $val . " ...";
    }

}
