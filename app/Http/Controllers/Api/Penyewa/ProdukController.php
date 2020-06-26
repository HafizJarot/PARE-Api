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

    public function index()
    {
        try{
            $datas = Produk::where('status', true)->get();

            $results = [];
            foreach ($datas as $data){
                $now = date('Y-m-d');
                $order = Order::where('id_produk', $data->id)
                    ->whereDate('selesai_sewa', '>=', $now)->first();

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
