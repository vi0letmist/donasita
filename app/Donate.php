<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    protected $table = 'donates';

    protected $fillable = [
        'nama','email','nominal','status','bukti_pembayaran', 'komen','anonim','batas_date'
    ];

    public function galadana(){
        return $this->belongsTo(Galadana::class, 'galadana_id', 'id');
    }
}
