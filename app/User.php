<?php

namespace App;

use App\Notifications\VerifyApiEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendApiEmailVerificationNotification()
    {
        $this->notify(new VerifyApiEmail());
    }

    public function sendNotify($message){
        return event(new Events\UserRegisterEvent($message));
    }

    public function penyewa()
    {
        return $this->hasOne(Penyewa::class, 'id_user', 'id');
    }

    public function pemilik()
    {
        return $this->hasOne(Pemilik::class, 'id_user', 'id');
    }

    public function updateFcm($fcm_token)
    {
        return $this->update(['fcm_token' => $fcm_token]);
    }

    // public function orders(){
    //     return $this->hasMany(Order::class, 'id_penyewa', 'id');
    // }
}
