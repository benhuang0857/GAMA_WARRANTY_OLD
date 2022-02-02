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
        $orders = Order::where('uniqid', $user_uniqid)->get();

        $data = [
            'Orders' => $orders
        ];

        return view('ordertable')->with('Data', $data);
    }
}
