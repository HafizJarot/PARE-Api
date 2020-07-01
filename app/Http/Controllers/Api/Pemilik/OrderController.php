<?php

namespace App\Http\Controllers\Api\Pemilik;

use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function myOrders()
    {
        $user = Auth::guard('api')->user();
        $orders = Order::where('id_penyewa', $user->id)->get();

        return response()->json([
            'messsage' => 'successfully get my order',
            'status' => true,
            'data' => $orders
        ]);
    }
}
