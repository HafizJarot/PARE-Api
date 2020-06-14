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

    public function loginPenyewa(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($request->role != false){
            response()->json([
                'message' => 'anda bukan penyewa!',
                'status' => false,
            ]);
        }

        $credentials = [
            'email' => $request-> email,
            'password' => $request-> password,
            'role' => false
        ];

        if (Auth::guard('user')->attempt($credentials)){
            $user = Auth::guard('user')->user();
            if ($user->email_verified_at !== null){
                return response()->json([
                    'status' => true,
                    'message' => 'Anda berhasil login',
                    'data' => $user,
                ], 200);

            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'verifikasi email anda dahulu',
                    'data' => (object)[],
                ], 401);

            }
        }else{
            return response()->json([
                'status' => false,
                'massage' => 'Gagal login',
                'data' => [],
            ], 401);
        }
    }

    public function loginPemilik(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($request->role != true){
            response()->json([
                'message' => 'anda bukan pemilik!',
                'status' => false,
            ]);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('user')->attempt($credentials)){
            $user = Auth::guard('user')->user();
            if ($user->email_verified_at !== null){
                return response()->json([
                    'status' => true,
                    'message' => 'Anda berhasil login',
                    'data' => $user,
                ], 200);

            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'verifikasi email anda dahulu',
                    'data' => (object)[],
                ], 401);

            }
        }else{
            return response()->json([
                'status' => false,
                'massage' => 'Gagal login',
                'data' => [],
            ], 401);
        }
    }
}
