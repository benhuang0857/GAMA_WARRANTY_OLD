<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class WithDrawController extends Controller
{
    public function index()
    {
        $user_uniqid = Auth::user()->uniqid;
        $user = User::where('uniqid', $user_uniqid)->first();
        
        $data = [
            'UID' => $user_uniqid,
            'User' => $user
        ];

        //dd($data);

        return view('withdraw')->with('Data', $data);
    }
}
