<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_berita';
    protected $fillable = [
        'judul',
        'isi_berita',
        'tag',
        'gambar',
    ];
}
