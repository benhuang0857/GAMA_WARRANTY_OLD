<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CardTemplate\CarTemplate;
use App\CheckWarranty;
use App\WarrantyCard;
use App\Product;
use App\Brand;
use App\GamaPointLog;
use App\User;
use Auth;

class WarrantyFormPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($uid = null)
    {
        if($uid == null)
        {
            $recommand = 'no';
        }
        else
        {
            $recommand = $uid;
        }
        
        $products = Product::all();
        $brands = Brand::all();

        $data = [
            'Auth'     => Auth::user(),
            'Products' => $products,
            'Brands'   => $brands,
            'Recommand'=> $recommand
        ];

        return view('welcome')->with('Data', $data);
    }

    public function warrantytable()
    {
        $mycard = WarrantyCard::where('user_uniqid', Auth::user()->uniqid)->get();
        return view('warrantytable')->with('mycard', $mycard);
    }

    public function getProductHTM(Request $req)
    {
        $num = $req->num;
        $basicHTM = new CarTemplate;
        return $basicHTM->renderCarHTM($num);
    }

    public function postWarranty(Request $req)
    {
        $card = new WarrantyCard;
        $card->check_code = $req->input('check_code');
        $card->card_id = uniqid();
        $card->user_uniqid = Auth::user()->uniqid;
        $card->name = $req->input('user_name');
        $card->mobile = $req->input('user_mobile');
        $card->email = $req->input('user_email');
        $card->address = $req->input('user_address');
        $card->car_license = $req->input('user_carlicense');
        $card->car_brand = $req->input('user_carbrand');
        $card->carname = $req->input('user_carname');
        $card->warranty_type = $req->input('warranty_type');
        $card->construction_by = $req->input('store');
        $card->construction_date = $req->input('construction_date');
        $card->price = $req->input('price');

        $flag = false;
        foreach($req->input('product_group') as $items)
        {
            if(strpos($items['name'], "product") !== false)
            {
                if($flag == true)
                {
                    $card->warranty_body .= "/n";
                }
                $card->warranty_body .= $items['value'].':';
                $flag = true;
            }
            else
            {
                $card->warranty_body .= $items['value'].',';
            }

        }

        $card->recommand_user_id = $req->input('recommand');
        try
        {
            $card->save();
            $checkWarranty = CheckWarranty::where('check_code', $card->check_code)->first();
            $checkWarranty->used = 'YES';
            $checkWarranty->save();

            if($card->recommand_user_id != 'no')
            {
                $GamaPointLog = new GamaPointLog;
                $GamaPointLog->userid_share = $card->recommand_user_id;
                $GamaPointLog->share_name = User::where('uniqid', $card->recommand_user_id)->first()->name;
                $GamaPointLog->userid_used = Auth::user()->uniqid;
                $GamaPointLog->used_name = Auth::user()->name;
                $GamaPointLog->point = 500;
                $GamaPointLog->status = 'OFF';
                $GamaPointLog->used = 'NO';
                $GamaPointLog->note = '會員'.$GamaPointLog->used_name.'使用了會員'.$GamaPointLog->share_name.'的推薦連結，贈送兩位會員點數：'.$GamaPointLog->point;
                $GamaPointLog->save();                
            }
            return 'success';
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function checkcode(Request $req)
    {
        $check_code = $req->check_code;
        $find = CheckWarranty::where('check_code', $check_code)->first();
        
        if( $find != null && $find->used != 'YES' )
        {
            return 'pass';
        }
        else
        {
            return 'error';
        }
    }
}
