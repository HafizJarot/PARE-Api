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

    public function register(Request $request){
        $this->validate($request,[
           'nama' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required'
        ]);

        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->api_token = Str::random(80);
        $user->save();
        return response()->json([
           'message'=>'Berhasil Register',
           'status'=>true,
           'data'=>$user
        ]);



    }


}
