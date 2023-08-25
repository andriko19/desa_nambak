<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_variant_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_variant_name',
        'product_variant_desc',
        'status'

    ];
}
