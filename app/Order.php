<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class, 'id_penyewa', 'id');
    }

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'id_pemilik', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}
