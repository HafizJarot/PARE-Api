<?php

namespace App\Http\Controllers\Api\Penyewa;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use App\Order;
use App\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function product(Request $request)
    {
        if($request->id_pemilik){
            $products = Produk::where('id_pemilik', $request->id_pemilik)
                ->where('id_kecamatan', $request->id_kecamatan)->get();
        }else{
            $products = Produk::where('id_pemilik', $request->id_pemilik)->get();
        }


        return response()->json([
            'message' => 'berhasil',
            'status' => true,
            'data' => ProdukResource::collection($products)
        ]);
    }

    public function fetchProductByPemilik($pemilik_id)
    {
        try{
            $datas = Produk::where('status', true)->where('id_pemilik', $pemilik_id)->get();

            $results = [];
            foreach ($datas as $data){
                $now = date('Y-m-d');
                $order = Order::where('id_produk', $data->id)
                    ->whereDate('tanggal_selesai_sewa', '>=', $now)->first();
                if (!$order){
                    array_push($results, $data);
                }
            }

            return response()->json([
                'message' => 'berhasil',
                'status' => true,
                'data' => ProdukResource::collection($results)
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }

    public function search(Request $request)
    {
        $tanggal_mulai = $request->tanggal_mulai;
        $tanggal_selesai = Carbon::parse($tanggal_mulai)->addMonths($request->tanggal_selesai);

        $tgl_mulai = Carbon::parse($request->tanggal_mulai)->format('d');
        $now = Carbon::now()->format('d');

        if ($tgl_mulai < $now){
            return response()->json([
                'message' => 'tidak ada papan reklame pada hari kemaren',
                'status' => false
            ]);
        }else{
            $orders = Order::whereDate('tanggal_mulai_sewa', '>=', $tanggal_mulai)
                ->whereDate('tanggal_mulai_sewa', '<=', $tanggal_selesai)->get();
            $produks = Produk::where('status', true)->get();

            $results = [];
            foreach ($produks as $key => $produk){
                if (isset($orders[$key]->id_produk) != $produk->id){
                    array_push($results, $produk);
                }
            }

            return response()->json([
                'message' => 'berhasil',
                'status' => true,
                'data' => ProdukResource::collection($results)
            ]);
        }
    }

}
