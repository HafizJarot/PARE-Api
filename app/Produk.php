<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function order(){
        return $this->hasOne(Order::class, 'id_produk', 'id');
    }
}
