<?php

namespace App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
            return response()->json(['message' => $validator->errors(), 'status' => false]);
        }

        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->role = false;
        $user->password = Hash::make($request->password);
        $user->api_token = Str::random(80);
        $user->alamat = $request->alamat;
        $user->save();
        $user->sendApiEmailVerificationNotification();
        $message = "Cek Email Anda, Verifikasi Dahulu";

        return response()->json([
           'message' => $message,
           'status' => true,
           'data' => $user
        ]);

    }

    public function registerPemilik(Request $request){

        $validator = Validator::make($request->all(), [
            'no_izin'           => 'required|unique:users',
            'nama_perusahaan'   => 'required',
            'email'             => 'required|email|unique:users',
            'password'          => 'required',
            'alamat'            => 'required',
            'no_hp'             => 'required',
        ]);

        if ($validator->fails()){
            return response()->json(['message' => $validator->errors(), 'status' => false]);
        }

        $user = new User();
        $user->no_izin = $request->no_izin;
        $user->nama_perusahaan = $request->nama_perusahaan;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->fcm_token = $request->fcm_token;
        $user->role = true;
        $user->password = Hash::make($request->password);
        $user->api_token = Str::random(80);
        $user->status = false;
        $user->save();

        $user->sendNotify('success');
        //$user->sendApiEmailVerificationNotification();
        //$message = "Cek Email Anda, Verifikasi Dahulu";

        return response()->json([
            'message' => 'berhasil register, silahkan menunggu konfirmasi dari admin',
            'status' => true,
            'data' => $user
        ]);

    }
}
