<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_form';
    protected $fillable = [
        'nama',
        'alamat',
        'no_tlp',
        'email',
        'aduan',
    ];
}
