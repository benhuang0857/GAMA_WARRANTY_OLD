<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $recommand_url = $user->uniqid;

        $data = [
            'User' => $user,
            'Recommand_URL'=> 'https://'.$_SERVER['SERVER_NAME'].'/'.'warranty'.'/'.$recommand_url
        ];

        return view('home')->with('Data', $data);
    }

    public function editPage()
    {
        $user = Auth::user();

        $data = [
            'User' => $user
        ];

        return view('editprofile')->with('Data', $data);
    }

    public function update(Request $req)
    {
        $user = Auth::user();

        try {
            $user->name    = $req->input('name');
            $user->email   = $req->input('email');
            $user->mobile  = $req->input('mobile');
            $user->address = $req->input('address');

            if( $req->input('password') != null )
            {
                $user->password = bcrypt($req->input('password'));
            }
            $user->save();
            Session::flash('message', "更新資料成功!");
            return redirect('home');
        } catch (\Throwable $th) {
            Session::flash('message', "錯誤，您使用的手機已經被註冊，請聯絡官方人員協助!");
            return redirect('home');
        }        
    }
}
