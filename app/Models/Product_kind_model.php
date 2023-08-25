<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_kind_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_kind_name',
        'product_kind_desc',
        'status'

    ];
}
