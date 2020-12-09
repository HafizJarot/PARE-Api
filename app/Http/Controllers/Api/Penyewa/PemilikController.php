<?php

namespace App\Http\Controllers\Api\Penyewa;

use App\Http\Controllers\Controller;
use App\Http\Resources\PemilikResource;
use App\Pemilik;
use Illuminate\Http\Request;

class PemilikController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function all()
    {
        $pemiliks = Pemilik::all();

        return response()->json([
            'message' => 'sukses ambil data pemilik ',
            'status' => true,
            'data' => $pemiliks
        ]);
    }

    public function search($id_kecamatan)
    {
        $pemiliks = Pemilik::with(['products' => function($p) use($id_kecamatan) {
            $p->where('id_kecamatan', $id_kecamatan);
        }])->get();

        $res = [];
        foreach ($pemiliks as $pemilik){
            if (count($pemilik->products) > 0) {
                array_push($res, $pemilik);
            }
        }

        return response()->json([
            'message' => 'success',
            'status' => true,
            'data' => PemilikResource::collection($res)
        ]);
    }
}
