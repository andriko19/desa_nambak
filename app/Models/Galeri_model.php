<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_galeri';
    protected $fillable = [
        'jenis',
        'judul',
        'gambar',
    ];
}
