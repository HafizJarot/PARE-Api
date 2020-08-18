<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $guarded = [];

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'id_pemilik', 'id');
    }

    public function order(){
        return $this->hasOne(Order::class, 'id_produk', 'id');
    }
}
