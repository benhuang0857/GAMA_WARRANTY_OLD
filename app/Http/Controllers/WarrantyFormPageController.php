<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CardTemplate\CarTemplate;
use App\WarrantyCard;
use App\Product;
use App\Brand;

class WarrantyFormPageController extends Controller
{
    public function index($uid = null)
    {
        $recommand = $uid;
        $products = Product::all();
        $brands = Brand::all();

        $data = [
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

        //$card->warranty_body = json_encode($req->input('product_group'), JSON_UNESCAPED_UNICODE);
        $card->recommand_user_id = $req->input('recommand');
        try
        {
            $card->save();
            return 'success';
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
