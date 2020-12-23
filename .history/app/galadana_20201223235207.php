<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galadana extends Model
{
    protected $table = 'galadana';

    protected $fillable = [
        'judul', 'gambar','cerita','target_capaian','progres_capaian','status','slug'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    public function donate()
    {
        return $this->hasMany(Donate::class);
    }
}
