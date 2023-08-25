<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'product_name',
        'product_detail',
        'product_shortdetail',
        'product_brand',
        'product_collection',
        'product_type',
        'product_form',
        'product_package',
        'product_price',
        'product_price_currency',
        'product_weight',
        'product_width',
        'product_height',
        'product_length',
        'product_acidityscore',
        'product_aciditydesc',
        'product_bodyscore',
        'product_bodydesc',
        'product_roastdesc',
        'product_typedesc',
        'product_intensity',
        'product_default_discount',
        'status_stock',
        'fileimages',
        'status',
        'deleted'
    ];
}
