<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_banner';
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
    ];
}
