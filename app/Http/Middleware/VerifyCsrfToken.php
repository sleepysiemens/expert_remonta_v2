<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/locale/change/', '/city/store/', '/admin/category_slider/updateSliderAlt/*',
        '/admin/blocks/summernote/upload'
    ];
}
