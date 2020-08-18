<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $guarded = [];

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'pemilik_id', 'id');
    }
}
