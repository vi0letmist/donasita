<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galadana extends Model
{
    protected $table = 'galadana';

    protected $fillable = [
        'judul', 'gambar','cerita','batas_waktu','target_capaian','progres_capaian','status','slug'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    public function donates()
    {
        return $this->hasMany(Donate::class, 'id', 'galadana_id');
    }
}
