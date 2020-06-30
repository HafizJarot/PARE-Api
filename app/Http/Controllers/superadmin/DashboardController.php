<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $penyewa = User::where('role', false)->get()->count();
        $pemilik = User::where('role', true)->get()->count();

        return view('pages.admin.dashboard', compact('penyewa', 'pemilik'));
    }
}
