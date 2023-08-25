<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Member_model extends Authenticatable 
{
    use HasFactory;
    protected $fillable = [
        'id_users_login',
        'username',
        'password',
        'email',
        'emailtanpatitik',
        'notelp',
        'firstname',
        'lastname',
        'fullname',
        'nickname',
        'website',
        'company',
        'gambar',
        'alamat',
        'kecamatan',
        'kota',
        'provinsi',
        'negara',
        'kodenegara',
        'kodepos',
        'setujunews',
        'saldoredem',
        'poin',
        'idmembershipsky',
        'referralcode',
        'lahirtgl',
        'statusmembership',
        'infodari',
        'registerdate',
        'status',
        'deleted',
    ];
}