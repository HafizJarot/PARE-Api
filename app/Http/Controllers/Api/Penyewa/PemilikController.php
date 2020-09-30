<?php

namespace App\Http\Controllers\Api\Penyewa;

use App\Http\Controllers\Controller;
use App\Pemilik;
use Illuminate\Http\Request;

class PemilikController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function fetchPemilik()
    {
        $pemiliks = Pemilik::all();

        return response()->json([
            'message' => 'sukses ambil data pemilik ',
            'status' => true,
            'data' => $pemiliks
        ]);
    }
}
