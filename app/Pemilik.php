<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }

    public static function checkPemilik($no_izin)
    {
        return Pemilik::where('no_izin', $no_izin)->first();
    }

    public function products()
    {
        return $this->hasMany(Produk::class, 'id_pemilik', 'id');
    }

    public function bank()
    {
        return $this->hasOne(Bank::class, 'id_pemilik', 'id');
    }
}
