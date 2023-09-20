<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_footer';
    protected $fillable = [
        'jenis',
        'judul',
        'prakata',
        'hari',
        'jam_oprasional',
    ];
}
