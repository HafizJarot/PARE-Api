<?php

namespace App\Http\Controllers\Api\Penyewa;

use App\Http\Controllers\Controller;
use App\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $datas = Produk::all();

        $item = [];
        foreach ($datas as $data) {
            $item[] = [
                'id' => $data->id,
                'ukuran' => $data->ukuran,
                'masa_berlaku' => $data->masa_berlaku,
                'keterangan' => $data->keterangan,
                'harga_sewa' => $data->harga_sewa,
                'user' => $data->user,

            ];
        }

        return response()->json([
            'message' => 'berhasil',
            'status' => true,
            'data' => $item
        ]);
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
