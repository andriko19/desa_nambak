<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInformasi_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_data_dan_informasi';
    protected $fillable = [
        'jenis',
        'judul',
        'isi_data_informasi',
        'tag',
        'gambar',
    ];
}
