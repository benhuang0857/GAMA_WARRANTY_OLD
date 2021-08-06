<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CardTemplate\CarTemplate;

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
        dd($req);
    }
}
