<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $penyewa = User::where('role', false)->get()->count();
        $pemilik = User::where('role', true)->get()->count();

        return view('pages.admin.dashboard', compact('penyewa', 'pemilik'));
    }

    public function notify(){
        $notify = User::where('role', true)->where('status','0')->get(['status']);
        return $notify;
    }
}
