<?php

namespace App\Http\Controllers\superadmin;

use App\PemilikReklame;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pemilik;

class NotifikasiPemilikReklameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notifs = Pemilik::whereHas('user', function($user){
            $user->where('status', false)->where('role', true);
        })->get();
        return view('pages.admin.notif.notif', compact('notifs'));
    }

    public function update($id)
    {
        $pemilik= Pemilik::find($id);
        $user = User::whereId($pemilik->id_user)->first();
        $user->update(['status' => true]);
        return redirect()->route('notif.index');
    }


    public function destroy($id)
    {
        //
    }
}
