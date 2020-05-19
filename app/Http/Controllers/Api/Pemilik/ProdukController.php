<?php

namespace App\Http\Controllers\Api\Pemilik;

use App\Http\Controllers\Controller;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request)
    {
        $produk = new Produk();
        $produk->id_user = Auth::user()->id;
        $produk->ukuran = $request->ukuran;
        $produk->masa_berlaku = $request->masa_berlaku;
        $produk->keterangan = $request->keterangan;
        $produk->harga_sewa = $request->harga_sewa;
        $produk->save();
        
        return response()->json([
            'message' => 'berhasil',
            'status' => true,
            'data' => $produk
        ]);

    }
}
