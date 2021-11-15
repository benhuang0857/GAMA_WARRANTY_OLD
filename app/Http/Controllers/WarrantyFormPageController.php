<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CardTemplate\CarTemplate;
use App\CardTemplate\CarTemplateCPF;
use App\CheckWarranty;
use App\WarrantyCard;
use App\Product;
use App\Series;
use App\Brand;
use App\GamaPointLog;
use App\User;
use App\GAMAStore;
use Auth;
use PDF;

class WarrantyFormPageController extends Controller
{
    public function __construct(Request $req)
    {
        try {
            $url = \Request::getRequestUri();
            $url_arr = explode('/', $url);
            setcookie("_UID", $url_arr[2]);
        } catch (\Throwable $th) {
            //throw $th;
        }
        $this->middleware('auth');
    }
    
    public function index($uid = null)
    {
        try {
            $recommand = $_COOKIE['_UID'];
        } catch (\Throwable $th) {
            $recommand = 'no';
        }
        
        $products = Product::all();
        $brands = Brand::all();
        $allstores = GAMAStore::all();

        $data = [
            'Auth'     => Auth::user(),
            'Products' => $products,
            'Brands'   => $brands,
            'Recommand'=> $recommand,
            'AllStores'=> $allstores
        ];

        return view('welcome')->with('Data', $data);
    }

    public function reponseProduct(Request $req)
    {
        //return $req->type;
        $Products = Product::where('category', 'SUN')->get();
        $carside = "";
        if($req->type == 'SUN')
        {
            $Products = Product::where('category', 'SUN')->get();
            $carside .= '
            <div class="form-group pb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="前擋" name="construction-site-1">
                    <label class="form-check-label" for="inlineCheckbox1">前擋</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="後擋" name="construction-site-1">
                    <label class="form-check-label" for="inlineCheckbox2">後擋</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="前側檔" name="construction-site-1">
                    <label class="form-check-label" for="inlineCheckbox3">前側檔</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="後側檔" name="construction-site-1">
                    <label class="form-check-label" for="inlineCheckbox4">後側檔</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="左右側" name="construction-site-1">
                    <label class="form-check-label" for="inlineCheckbox5">左右側</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="天窗" name="construction-site-1">
                    <label class="form-check-label" for="inlineCheckbox6">天窗</label>
                </div>
            </div>
            ';
        }
        if($req->type == 'CPF')
        {
            $Products = Product::where('category', 'CPF')->get();
            $carside .= '
            <div class="form-group pb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="前擋" name="construction-site-1">
                    <label class="form-check-label" for="inlineCheckbox1">全車</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="後擋" name="construction-site-1">
                    <label class="form-check-label" for="inlineCheckbox2">玻璃</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="前擋" name="construction-site-1">
                    <label class="form-check-label" for="inlineCheckbox3">車身</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="後擋" name="construction-site-1">
                    <label class="form-check-label" for="inlineCheckbox4">輪胎</label>
                </div>
            </div>
            ';
        }

        $presult = "";
        foreach($Products as $Product)
        {
            $presult .=  '<option value="'.$Product->name.'">'.$Product->name.'</option>';
        }

        return $output = '
            <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">產品</span>
                </div>
                <select class="form-control" class="product" name="product-1" required>
                    <option value="none">無</option>
                    XXX
                    '.$presult.'
                </select>

                <div class="input-group-append">
                    <a class="btn btn-secondary plus-dp" style="width:40px">+</a>
                </div>
            </div>
            '.$carside.'
            <script>
            var i = 2;
            $(".plus-dp").click(function(){
                console.log(warranty_type);
                $.ajax({
                    type: "GET",
                    url: "/product",
                    data: {
                        "num": i,
                        "type": warranty_type
                    },
                    dataType: "html",
                    success: function (response) {
                        $("#dp").append(response);
                        i++;
                    },
                });
            });
        
            $(".minus-dp").click(function(){
                $(this).parent().remove();
            });
            </script>
        ';
    }

    public function warrantytable()
    {
        $mycard = WarrantyCard::where('user_uniqid', Auth::user()->uniqid)->get();
        return view('warrantytable')->with('mycard', $mycard);
    }

    public function getProductHTM(Request $req)
    {
        $num = $req->num;
        $type = $req->type;
        $basicHTM = new CarTemplate;

        if($type == 'CPF')
        {
            $basicHTM = new CarTemplateCPF;
        }
        if($type == 'SUN')
        {
            $basicHTM = new CarTemplate;
        }

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
                $product_body = explode('/n', $card->warranty_body);
                $products = array();
                foreach($product_body as $body)
                {
                    array_push($products, explode(':', $body)[0]);
                }

                #Find series and max point
                $maxPoints = 0;
                // foreach($products as $product)
                // {
                //     $target_series_id = Product::where('name', $product)->first()->series;
                //     $series = Series::where('id', $target_series_id)->first();
                //     if($series != null)
                //     {
                //         if($series->gama_point > $maxPoints)
                //         {
                //             $maxPoints = $series->gama_point;
                //         }
                //     }
                // }
                //dd($maxPoints);

                $GamaPointLog = new GamaPointLog;
                $GamaPointLog->userid_share = $card->recommand_user_id;
                $GamaPointLog->share_name = User::where('uniqid', $card->recommand_user_id)->first()->name;
                $GamaPointLog->userid_used = Auth::user()->uniqid;
                $GamaPointLog->used_name = Auth::user()->name;
                $GamaPointLog->point = $maxPoints;
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

    public function getWarrantyPDF($card_id)
    {

        $data = WarrantyCard::where('card_id', $card_id)->first();
        $pdf = PDF::loadView('warrantypdf', array('CARD' => $data));
        return $pdf->download('gama.pdf'); 
    }
}
