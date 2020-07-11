<?php

namespace App\Http\Controllers\Api\Pemilik;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function myOrders(){
        $auth = Auth::guard('api')->user();

        $orders = Order::where('id_pemilik', $auth->id)->get();

        return response()->json([
            'message' => 'successfully get order by pemilik',
            'status' => true,
            'data' => OrderResource::collection($orders)
        ]);
    }
}
