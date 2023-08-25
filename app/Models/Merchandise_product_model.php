<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise_product_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'category_code',
        'id_product',
        'name',
        'poinneed',
        'status',
        'deleted',
    ];
}