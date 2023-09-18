<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_layanan';
    protected $fillable = [
        'jenis',
        'judul',
        'deskripsi',
        'gambar',
    ];
}
