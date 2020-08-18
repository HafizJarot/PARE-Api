<?php

namespace App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\PemilikResource;
use App\Http\Resources\PenyewaResource;
use App\Http\Resources\UserResource;
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
            $user->update(['fcm_token' => $request->fcm_token]);
            if($user->role == true){
                if($user->status == true){
                    return response()->json([
                        'status' => true,
                        'message' => 'Anda berhasil login',
                        'data' => new PemilikResource($user->pemilik),
                    ], 200);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'Tidak dapat login, mungkin email anda belum dikonfirmasi',
                        'data' => (object)[]
                    ]);
                }
            }else{
                if($user->status == true){
                    return response()->json([
                        'status' => true,
                        'message' => 'Anda berhasil login',
                        'data' => new PenyewaResource($user->penyewa),
                    ], 200);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'Tidak dapat login, mungkin email anda belum verifikasi',
                        'data' => (object)[]
                    ]);
                }
            }
        }else{
            return response()->json([
                'status' => false,
                'massage' => 'masukkan email dan password yang benar',
                'data' => (object)[],
            ]);
        }
    }
}
