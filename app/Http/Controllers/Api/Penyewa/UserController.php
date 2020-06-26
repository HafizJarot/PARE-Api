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
        $user = User::where('id', Auth::user()->id)->get();

        return response()->json([
            'message' => 'successfully get profile user',
            'status' => true,
            'data' => $user
        ]);
    }
}
