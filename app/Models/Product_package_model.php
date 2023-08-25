<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_package_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_package_name',
        'product_package_desc',
        'status',
        'deleted'
    ];
}
