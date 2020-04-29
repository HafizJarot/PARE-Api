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
}
