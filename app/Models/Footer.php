<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $table = 'footers';

    protected $fillable = [
        'nama_toko',
        'deskripsi_toko',
        'email_toko',
        'nomor_toko',
        'alamat_toko',
        'kota',
        'link_instagram',
        'link_youtube',
        'link_facebook',
    ];

}
