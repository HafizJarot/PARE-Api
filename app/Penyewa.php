<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }
}
