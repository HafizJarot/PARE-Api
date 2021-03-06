<?php

namespace App\Http\Controllers\Api\Pemilik;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
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
            'data' => new UserResource($user)
        ]);
//        $auth = Auth::user();
//
//        $item = [
//            "id" => $auth->id,
//            "email" => $auth->email,
//            "role" => $auth->role,
//            "api_token" => $auth->api_token,
//            "fcm_token" => $auth->fcm_token,
//            "status" => $auth->status,
//            "pemilik" => $auth->pemilik
//        ];
//
//        return response()->json([
//            'message' => 'success',
//            'status' => true,
//            'data' => $item
//        ]);
    }

}
