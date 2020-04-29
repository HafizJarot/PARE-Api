<?php

namespace App\Http\Controllers\Api\Penyewa;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request){
        $this->validate($request,[
            'harga'=>'required|numeric',
            'waktu_sewa'=>'required|numeric',
        ]);

        $data= new Order();
        $data->id_penyewa = $request->id_penyewa;
        $data->id_pemilik = $request->id_pemilik;
        $data->id_produk = $request->id_produk;
        $data->harga = $request->harga;
        $data->waktu_sewa = $request->waktu_sewa;
        $data->total_harga = $request->harga * $request->waktu_sewa;
        $data->save();

        return response()->json([
           'message'=>'Orderan berhasil',
           'status'=>true,
           'data'=>$data
        ]);





    }
}
