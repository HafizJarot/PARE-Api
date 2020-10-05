<?php

namespace App\Http\Controllers\Api\Penyewa;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Midtrans\Config;
use App\Http\Controllers\Midtrans\Snap;
use App\Http\Resources\OrderResource;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Facades\FCM as FacadesFCM;

class OrderController extends Controller
{

    public function __construct()
    {
        Config::$serverKey = 'SB-Mid-server-zNbcUa1_wMHbzGUVHRbZshNE';
        Config::$isSanitized = true;
        Config::$is3ds = true;
        $this->middleware('auth:api')->except('snapToken');
    }

    public function store(Request $request)
    {

        $str1 = substr($request, 5, 2);
        $str2 = substr($request, 5, 2);

        $str = (int)$str2 - (int)$str1;
        $str == 0 ? 1 : $str;

        $order = new Order();
        $order->id_penyewa = Auth::user()->id;
        $order->id_pemilik = $request->id_pemilik;
        $order->id_produk = $request->id_produk;
        $order->harga = $request->harga;
        $sisi = $request->sisi;
        if ($sisi == 2){
            $order->total_harga = ($request->harga * 2) * $str;
        }else{
            $order->total_harga = $request->harga * $str;
        }
        $order->tanggal_mulai_sewa = $request->tanggal_mulai_sewa;
        $order->selesai_sewa = $request->selesai_sewa;
        $order->verifikasi = 'menunggu di konfirmasi';
        $order->status = 'pending';
        $order->save();

        $pemilik = User::where('id', $order->pemilik->id)->first();
        $pemilik->saldo += $order->total_harga;
        $pemilik->update();

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);
        $message = "ada pesanan masuk";
        $notificationBuilder = new PayloadNotificationBuilder('pare app');
        $notificationBuilder->setBody($message)->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);
        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $_data = $dataBuilder->build();

        // You must change it to get your tokens
        $token = $order->pemilik->fcm_token;
        FacadesFCM::sendTo($token, $option, $notification, $_data);

        return response()->json([
            'message' => 'Orderan berhasil',
            'status' => true,
            'data' => (object)[]
            //'data' => $order->pemilik->fcm_token
        ]);
    }

    public function snapToken(Request $request)
    {
        $orders = $request->item_details;

        $item_details = [];
        foreach ($orders as $val) {
            $penyewa = User::where('id', $val['id'])->first();
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
                'first_name' => $penyewa->nama,
                'email' => $penyewa->email,
                'telephone' => '08345678910',
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
