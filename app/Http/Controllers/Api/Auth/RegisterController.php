<?php

namespace App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Controller;
use App\Pemilik;
use App\Penyewa;
use App\Providers\RouteServiceProvider;
use App\Response;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Ui\Presets\React;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:user');
    }

    public function registerPenyewa(Request $request){

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'alamat' => 'required'
        ]);

        if ($validator->fails()){
            return Response::transform($validator->errors(), false, (object)[], 400);
        }

        $user = new User();
        $user->email = $request->email;
        $user->role = false;
        $user->password = Hash::make($request->password);
        $user->api_token = Str::random(60);
        $user->fcm_token = $request->fcm_token;
        $user->status = false;
        $user->save();
        $user->sendApiEmailVerificationNotification();

        $penyewa = new Penyewa();
        $penyewa->id_user = $user->id;
        $penyewa->nama = $request->nama;
        $penyewa->alamat = $request->alamat;
        $penyewa->save();

        $message = "Cek Email Anda, Verifikasi Dahulu";
        return Response::transform($message, true, (object)[], 200);
    }


    public function checkNoIzin($no_izin)
    {
        $checkPemilik = Pemilik::checkPemilik($no_izin);
        if(!$checkPemilik){
            $message = "no izin tidak terdaftar di sistem kami";
            return Response::transform($message, false, (object)[], 400);
        }else{
            $message = "berhasil mengambil data no izin";
            return Response::transform($message, true, $checkPemilik, 200);
        }
    }


    public function registerPemilik(Request $request) {

        $validator = Validator::make($request->all(), [
            'email'     => 'required|email|unique:users|max:20',
            'password'  => 'required',
        ]);

        if($validator->fails()){
            return Response::transform($validator->errors(), false, (object)[], 400);
        }

        $checkPemilik = Pemilik::checkPemilik($request->no_izin);

        if(!$checkPemilik){
            return Response::transform('no izin tidak terdaftar di sistem kami', 
            false, (object)[], 400);
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->api_token = Str::random(60);
        $user->fcm_token = $request->fcm_token;
        $user->role = true;
        $user->status = false;
        $user->save();
        //$user->sendNotify('success');

        $checkPemilik->id_user = $user->id;
        $checkPemilik->update();

        return Response::transform('berhasil register, silahkan menunggu konfirmasi dari admin', 
        true, (object)[], 400);
    }

}
