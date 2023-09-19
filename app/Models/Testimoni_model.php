<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_testimoni';
    protected $fillable = [
        'nama',
        'alamat',
        'foto',
        'tanggapan',
    ];
}
