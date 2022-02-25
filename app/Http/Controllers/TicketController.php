<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Order;
use App\User;
use App\SheetCode;
use Auth;

class TicketController extends Controller
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
    
    public function index()
    {
        $Tackets = Ticket::all();

        return view('ticketpage')->with('Tickets', $Tackets);
    }

    public function buyTicket(Request $req)
    {
        $Order = new Order();
        $User = User::where( 'uniqid', $req->user_uniqid )->first();
        

        if ($User->gama_point < $req->price) {
            return 'Do not have enough money';
        }

        $orderContain = [
            'code_type' => 'cpc',
            'pid' => $req->product_id,
            'product_name' => $req->product_name,
            'sheet_id' => "Ticket-".uniqid()
        ];
        $Order->uniqid = $req->user_uniqid;
        $Order->contain = json_encode($orderContain, JSON_UNESCAPED_UNICODE);
        $Order->price = $req->price;
        $Order->save();

        
        $User->gama_point -= $req->price;
        $User->save();

        //中油洗車車
        // if($req->code_type == 'cpc')
        // {
        //     $SheetCode = SheetCode::where('used', 'NO')->where('code_type', 'cpc')->first();

        //     if($SheetCode != null)
        //     {
        //         $orderContain = [
        //             'code_type' => 'cpc',
        //             'pid' => $req->product_id,
        //             'product_name' => $req->product_name,
        //             'sheet_id' => $SheetCode->code
        //         ];
        //         $Order->uniqid = $req->user_uniqid;
        //         $Order->contain = json_encode($orderContain, JSON_UNESCAPED_UNICODE);
        //         $Order->price = $req->price;
        //         $Order->save();
    
        //         $SheetCode->used = 'YES';
        //         $SheetCode->save();
    
        //         $User = User::where( 'uniqid', $req->user_uniqid )->first();
        //         $User->gama_point -= $req->price;
        //         $User->save();
        //     }
        //     else
        //     {
        //         return 'Out Of Stock';
        //     }
            
        // }
        
    }
}
