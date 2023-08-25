<?php

/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : supresso Laravel
 * Start-date : 19-09-2022
 */
/**
 “Barangsiapa yang memberi kemudharatan kepada seorang muslim, 
 maka Allah akan memberi kemudharatan kepadanya, 
 barangsiapa yang merepotkan (menyusahkan) seorang muslim 
 maka Allah akan menyusahkan dia.”
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_article_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'artikel_kode',
        'artikel_web',
        'artikel_static',
        'artikel_kategori_id',
        'artikel_lang',
        'artikel_judul',
        'artikel_short',
        'artikel_format',
        'artikel_konten',
        'artikel_note',
        'artikel_cover',
        'artikel_covermobile',
        'artikel_time',
        'artikel_url',
        'artikel_timestart',
        'artikel_timeend',
        'artikel_group',
        'artikel_status',
        'status',

    ];
}