<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail_model extends Model
{
    use HasFactory;
    protected $fillable = [

        'nomerorder',
        'idproduct',
        'iduser',
        'namaproduk',
        'gambar',
        'discon',
        'txtdiskon',
        'tax',
        'hargaproduk',
        'hargabelumdiskon',
        'qty',
        'subtotalproduk',
        'note',
        'review',
        'status',
        'deleted'

    ];
}
