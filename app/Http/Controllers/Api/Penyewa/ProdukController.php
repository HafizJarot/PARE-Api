<?php

namespace App\Http\Controllers\Api\Penyewa;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use App\Order;
use App\Produk;
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
}
