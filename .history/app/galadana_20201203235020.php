<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galadana extends Model
{
    protected $table = 'galadana';

    protected $fillable = [
        'judul', 'gambar','cerita','target_capaian','progres_capaian','status','slug'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function donate()
    {
        return $this->belongsTo(Donate::class);
    }
}
