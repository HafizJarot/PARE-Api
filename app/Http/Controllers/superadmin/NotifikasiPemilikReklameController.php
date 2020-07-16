<?php

namespace App\Http\Controllers\superadmin;

use App\PemilikReklame;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $notifs = User::where('role', true)->where('status','0')->get();
        return view('pages.admin.notif.notif', compact('notifs'));
    }

    public function update($id)
    {
        $notif= User::find($id);
        $notif->update(['status' => '1']);
        return redirect()->route('notif.index');
    }


    public function destroy($id)
    {
        //
    }
}
