<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GamaTransLog;
use App\User;

class ProductController extends Controller
{
    public function index()
    {
        return view('productpage');
    }

    public function transpoint(Request $req)
    {
        $user = User::where( 'uniqid', $req->input('user_uniqid') )->first();

        if( $user->gama_point >= $req->input('price') )
        {
            $GamaTransLog = new GamaTransLog;
            $GamaTransLog->product_name = $req->input('product_name');
            $GamaTransLog->user_uniqid = $req->input('user_uniqid');
            $GamaTransLog->user_name = $req->input('user_name');
            $GamaTransLog->user_mobile = $req->input('user_mobile');
            $GamaTransLog->cost = $req->input('price');
    
            $GamaTransLog->save();
    
            $user->gama_point -= $GamaTransLog->cost;
            $user->save();
        }
        else
        {
            return 'error';
        }

        
    } 
}
