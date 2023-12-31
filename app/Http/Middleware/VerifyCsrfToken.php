<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'banner/store',
        'tentang_desa/store',
        'layanan/store',
        'galeri/store',
        'testimoni/store',
        'konseling/store',
        'berita/store',
        'footer/store',
        'kontak/store',
        'data_informasi/store',
        'tag/store',

    ];
}
