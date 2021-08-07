<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CardTemplate\CarTemplate;
use App\WarrantyCard;

class WarrantyFormPageController extends Controller
{
    public function index()
    {
        $basicHTM = new CarTemplate;
        return view('welcome')->with('HTM', $basicHTM->renderCarHTM());
    }

    public function getProductHTM()
    {
        $basicHTM = new CarTemplate;
        return $basicHTM->renderCarHTM();
    }

    public function postWarranty(Request $req)
    {
        $card = new WarrantyCard;

        $card->card_id = uniqid();
        $card->name = $req->input('user-name');
        $card->mobile = $req->input('user-mobile');
        $card->email = $req->input('user-email');
        $card->address = $req->input('user-address');
        $card->car_license = $req->input('user-carlicense');
        $card->car_brand = $req->input('user-carbrand');
        $card->warranty_type = $req->input('user-cartype');
        $card->construction_by = $req->input('store');
        $card->price = $req->input('price');
        $card->recommand_user_id = $req->input('recommand');
    }
}
