<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount_cluster_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'nama',
        'active_date',
        'active_time',
        'actual_active_time',
        'off_date',
        'off_time',
        'actual_off_time',
        'active_statemen',
        'created_at',
        'created_who',
        'updated_at',
        'updated_who',
        'status',
        'flag'

    ];
}