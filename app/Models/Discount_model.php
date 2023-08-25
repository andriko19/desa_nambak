<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_id',
        'discount_cluster_id',
        'discount',
        'created_at',
        'created_who',
        'updated_at',
        'updated_who',
        'status',
        'flag'

    ];
}