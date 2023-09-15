<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangDesa_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_tentang_desa';
    protected $fillable = [
        'jenis',
        'judul',
        'prakata',
        'deskripsi',
        'pertanyaan',
        'jawaban',
        'gambar',
    ];
}
