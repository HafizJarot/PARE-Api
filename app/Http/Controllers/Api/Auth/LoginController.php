<?php

namespace App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
            if ($request->role == $user->role && $user->status == true){
                return response()->json([
                    'status' => true,
                    'message' => 'Anda berhasil login',
                    'data' => $user,
                ], 200);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'verifikasi email anda dahulu',
                ], 401);
            }
        }else{
            return response()->json([
                'status' => false,
                'massage' => 'masukkan email dan password yang benar'
            ], 401);
        }
    }
}
