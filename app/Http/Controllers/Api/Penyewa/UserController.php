<?php

namespace App\Http\Controllers\Api\Penyewa;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function profile()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return response()->json([
            'message' => 'successfully get profile user',
            'status' => true,
            'data' => $user
        ]);
    }

    public function ambilUang(Request $request)
    {
        $pemilik = Auth::user();

        if ($pemilik->saldo < $request->saldo){
            return response()->json([
                'message' => 'saldo anda kurang dari Rp. '.$request->saldo,
                'status' => false,
                'data' => (object)[]
            ]);
        }

        $pemilik->saldo -= $request->saldo;
        $pemilik->update();

        return response()->json([
            'message' => 'successfully ambil uang',
            'status' => true,
            'data' => (object)[]
        ]);
    }


    public function updateProfile(Request $request)
    {
        if ($request->password == null || empty($request->password)){
            $user = Auth::guard('driver-api')->user();
            $user->name = $request->name;
            $user->save();
            return response()->json([
                'message' => 'successfully update profile',
                'status' => true,
                'data' => $user
            ]);
        }else{
            $user = Auth::guard('driver-api')->user();
            $user->name = $request->name;
            $user->password = $request->password;
            $user->save();
            return response()->json([
                'message' => 'successfully update profile',
                'status' => true,
                'data' => $user
            ]);
        }
    }
}
