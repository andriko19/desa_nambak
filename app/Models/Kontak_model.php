<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_kontak';
    protected $fillable = [
        'jenis',
        'judul',
        'isi_kontak',
        'link',
    ];
}
