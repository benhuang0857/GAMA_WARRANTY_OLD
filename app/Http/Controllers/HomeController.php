<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
}
