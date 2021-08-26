<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CardTemplate\CarTemplate;
use App\WarrantyCard;
use App\Product;
use App\Brand;
use App\GamaPointLog;
use Auth;

class WarrantyFormPageController extends Controller
{
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

    public function getProductHTM(Request $req)
    {
        $num = $req->num;
        $basicHTM = new CarTemplate;
        return $basicHTM->renderCarHTM($num);
    }

    public function postWarranty(Request $req)
    {
        $card = new WarrantyCard;
        $card->card_id = uniqid();
        $card->name = $req->input('user_name');
        $card->mobile = $req->input('user_mobile');
        $card->email = $req->input('user_email');
        $card->address = $req->input('user_address');
        $card->car_license = $req->input('user_carlicense');
        $card->car_brand = $req->input('user_carbrand');
        $card->warranty_type = $req->input('warranty_type');
        $card->construction_by = $req->input('store');
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
            if($card->recommand_user_id != 'no')
            {
                $GamaPointLog = new GamaPointLog;
                $GamaPointLog->user_uniqid = $card->recommand_user_id;
                $GamaPointLog->point = 500;
                $GamaPointLog->note = '會員'.Auth::user()->uniqid.'使用了會員'.$card->recommand_user_id.'的推薦連結';
                $GamaPointLog->save();
            }
            return 'success';
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
