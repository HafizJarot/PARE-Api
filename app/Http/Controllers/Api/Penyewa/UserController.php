<?php

namespace App\Http\Controllers\Api\Penyewa;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

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
        $this->sendEmail($pemilik, $request);

        return response()->json([
            'message' => 'successfully ambil uang',
            'status' => true,
            'data' => (object)[]
        ]);
    }

    public function sendEmail($user, $request)
    {
        $content = $user->nama_perusahaan.' ingin menarik saldo ';
        Mail::send(
            'emails.tarik-saldo',
            [
                'nama_perusahaan' => $user->nama_perusahaan,
                'content' => $content,
                'name_bank' => $request->nama_bank,
                'account_name' => $request->nama_rekening,
                'account_number' => $request->nomor_rekening,
                'balance' => $request->saldo
            ],
            function ($message) use ($user) {
                $message->subject('Tarik Saldo');
                $message->from($user->email, $user->business_name);
                $message->to('pare@gmail.com');
            }
        );
        return true;
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
