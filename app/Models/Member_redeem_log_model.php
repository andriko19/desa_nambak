<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_redeem_log_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'iduser',
        'idproduct_redeem',
        'member_point_origin',
        'member_point_redeem',
        'member_point_actual',
        'redeem_description',
        'status',
        'deleted',
    ];
}