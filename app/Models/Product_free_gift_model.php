<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_free_gift_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'minimum_order',
        'status',
        'deleted',
    ];
}