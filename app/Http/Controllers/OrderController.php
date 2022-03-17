<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user_uniqid = Auth::user()->uniqid;
        $orders = Order::where('uniqid', $user_uniqid)
                        ->orderBy('created_at', 'desc')
                        ->paginate(5);

        $data = [
            'Orders' => $orders
        ];

        return view('ordertable')->with('Data', $data);
    }

    public function update(Request $req)
    {
        $order = Order::where('id', $req->id)->first();
        $order->click_time = $req->nowTime;
        $order->end_time = $req->endTime;
        $order->save();
    }

    public function close(Request $req)
    {
        $order = Order::where('id', $req->id)->first();
        $order->status = 'used';
        $order->save();
    }

    public function getTime(Request $req)
    {
        $order = Order::where('id', $req->id)->first();
        return $order->end_time;
    }
}
