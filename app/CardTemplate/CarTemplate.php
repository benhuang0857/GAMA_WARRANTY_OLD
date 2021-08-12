<?php

namespace App\CardTemplate;
use App\Product;

class CarTemplate
{
    public function renderCarHTM($num)
    {
        $Products = Product::all();

        $output = '
        <div class="php">
            <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">產品</span>
                </div>
                <select class="form-control" class="product" name="product-'.$num.'" required>
                <option value="none">無</option>';
                
                foreach($Products as $Product)
                {
                    $output .= '<option value='.$Product->name.'>'.$Product->name.'</option>';
                }

        $output .= '
                </select>

                <div class="input-group-append">
                    <a class="btn btn-secondary minus-dp" style="width:40px">–</a>
                </div>
            </div>

            <div class="form-group pb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="前擋" name="construction-site-'.$num.'">
                    <label class="form-check-label" for="inlineCheckbox1">前擋</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="後擋" name="construction-site-'.$num.'">
                    <label class="form-check-label" for="inlineCheckbox2">後擋</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="前側檔" name="construction-site-'.$num.'">
                    <label class="form-check-label" for="inlineCheckbox1">前側檔</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="後側檔" name="construction-site-'.$num.'">
                    <label class="form-check-label" for="inlineCheckbox2">後側檔</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="左右側" name="construction-site-'.$num.'">
                    <label class="form-check-label" for="inlineCheckbox2">左右側</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="天窗" name="construction-site-'.$num.'">
                    <label class="form-check-label" for="inlineCheckbox3">天窗</label>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(".minus-dp").click(function(){
                $(this).parent().parent().parent("div").remove();
                i--;
            });
        </script>
        ';

        return $output;
    }
}
