<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'nama','slug', 'gambar'
    ];
    public function galadana(){
        return $this->hasMany(Galadana::class, 'id', 'kategori_id');
    }
}
