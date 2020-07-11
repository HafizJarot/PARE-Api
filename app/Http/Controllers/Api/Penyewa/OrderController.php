<?php

namespace App\Http\Controllers\Api\Penyewa;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Midtrans\Config;
use App\Http\Controllers\Midtrans\Snap;
use App\Http\Resources\OrderResource;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function __construct()
    {
        Config::$serverKey = 'SB-Mid-server-lgheMLSAsWyuFmE1FmP7L2K1';
        Config::$isSanitized = true;
        Config::$is3ds = true;
        $this->middleware('auth:api')->except('snapToken');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'harga'=>'required|numeric',
            'selesai_sewa'=>'required|numeric',
            'tanggal_mulai_sewa'=>'required',
        ]);


        $order = new Order();
        $order->id_penyewa = Auth::user()->id;
        $order->id_pemilik = $request->id_pemilik;
        $order->id_produk = $request->id_produk;
        $order->harga = $request->harga;
        $sisi = $request->sisi;
        if ($sisi == 2){
            $order->total_harga = ($request->harga * 2) * $request->selesai_sewa;
        }else{
            $order->total_harga = $request->harga * $request->selesai_sewa;
        }
        $order->tanggal_mulai_sewa = $request->tanggal_mulai_sewa;
        $order->selesai_sewa = Carbon::parse($request->tanggal_mulai_sewa)->addMonths($request->selesai_sewa);
        $order->verifikasi = 'menunggu di konfirmasi';
        $order->status = 'pending';
        $order->save();

        return response()->json([
            'message'=> 'Orderan berhasil',
            'status'=> true,
            'data'=> new OrderResource($order)
        ]);
    }

    public function snapToken(Request $request)
    {
        $orders = $request->item_details;

        $item_details = [];
        foreach ($orders as $val) {
            $item_details[] = [
                'id' => $val['id'],
                'price' => $val['price'],
                'quantity' => $val['quantity'],
                'name' => $val['name']
            ];
        }

        $payload = [
            'transaction_details' => [
                'order_id' => rand()
            ],
            'item_details' => $item_details,
            'customer_details' => [
                'first_name' => 'a',
                'email' => 'penyewa@gmail.com',
                'telephone' => '0983784732',
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($payload);
            return response()->json($snapToken);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function myOrders()
    {
        $orders = Order::where('id_penyewa', Auth::user()->id)->get();

        return response()->json([
            'message' => 'successfully get my orders',
            'status' => true,
            'data' => OrderResource::collection($orders)
        ]);
    }
}
