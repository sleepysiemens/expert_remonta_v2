<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormType extends Model
{
    use HasFactory;
    protected $guarded=[];

    /*public function getTable()  {
        return config('app.city') === 'Астана' ? 'form_types' : 'form_types_almaty';
      }*/

    public static function getFormTypeId($path) {
        if(str_contains($path, 'uslugi/')) return 1;
        else if(str_contains($path, 'vacancies-office')) return 2;
        else if(str_contains($path, 'vacancies-objects')) return 3;
        else if(str_contains($path, 'vacancies') || str_contains($path, 'vacancy')) return 4;
        else if(str_contains($path, 'franchise')) return 5;
        else if(str_contains($path, 'main/sale') || $path === '/') return 6;
    }

    public static function getFormTypeIdAndName($path) {
        $id = self::getFormTypeId($path);
        $type = self::find($id);
        return "$id | $type->name";
    }

    
}
