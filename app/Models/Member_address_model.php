<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_address_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'idmembers',
        'subject',
        'recepient',
        'phone',
        'email',
        'country',
        'province',
        'city',
        'post_code',
        'address1',
        'address2',
        'status',
        'deleted',
    ];
}