<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $datas = Kecamatan::all();

        return response()->json([
            'message' => 'success',
            'status' => true,
            'data' => $datas
        ]);
    }
}
