<?php

namespace App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\PemilikResource;
use App\Http\Resources\PenyewaResource;
use App\Http\Resources\UserResource;
use App\Providers\RouteServiceProvider;
use App\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request-> email,
            'password' => $request-> password
        ];

        if (Auth::guard('user')->attempt($credentials)){
            $user = Auth::guard('user')->user();
            $user->fcm_token = $request->fcm_token;
            $user->update();
            
            if($user->role == true){
                if($user->status == true){
                    return Response::transform('Anda berhasil login', true, new UserResource($user), 200);
                }else{
                    return Response::transform('Tidak dapat login, mungkin email anda belum dikonfirmasi', 
                    false, (object)[], 401);
                }
            }else{
                if($user->status == true){
                    return Response::transform('Anda berhasil login', true, new UserResource($user), 200);
                }else{
                    return Response::transform('Tidak dapat login, mungkin email anda belum verifikasi', 
                    false, (object)[], 401);
                }
            }
        }else{
            return Response::transform('masukkan email dan password yang benar', false, (object)[], 401);
        }
    }
}
