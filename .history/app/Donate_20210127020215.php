<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    protected $table = 'donates';

    protected $fillable = [
        'nama','email','nominal','komen','anonim','batas_date'
    ];
    
    public function galadana(){
        return $this->belongsTo(Galadana::class);
    }
}
