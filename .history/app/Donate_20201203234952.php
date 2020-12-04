<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    protected $table = 'donates';

    protected $fillable = [
        'nama','email','nominal','komen'
    ];
    
    public function galadana(){
        return $this->hasMany(Galadana::class);
    }
}
