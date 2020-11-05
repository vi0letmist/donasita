<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galadana extends Model
{
    protected $table = 'galadana';

    protected $fillable = [
        'judul', 'gambar','cerita','penerima','target_capaian','progres_capaian','status'
    ];
}
