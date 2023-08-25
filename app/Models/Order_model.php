<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomerorder',
        'iduser',
        'tanggalorder',
        'jamorder',
        'status',
        'statustrack',
        'itemsubtotal',
        'discon',
        'coupon',
        'kodekupon',
        'persdiskon',
        'tax',
        'shippingprice',
        'ordertotal',
        'payment',
        'pengiriman',
        'namalengkap',
        'namalengkapawb',
        'firtsname',
        'lastname',
        'negara',
        'provinsi',
        'kota',
        'kecamatan',
        'alamat',
        'alamatawb',
        'alamatdua',
        'kodepos',
        'company',
        'email',
        'emailtanpatitik',
        'phone',
        'phoneawb',
        'addcatatan',
        'addcatatanawb',
        'statusawb',
        'notifnews',
        'deleted',
        'payment_id',
        'payment_method',
        'payment_status'
    ];
}
