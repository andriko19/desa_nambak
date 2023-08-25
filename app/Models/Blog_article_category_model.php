<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_article_category_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'artikel_kategori_judul',
        'artikel_kategori_status',
    ];
}
