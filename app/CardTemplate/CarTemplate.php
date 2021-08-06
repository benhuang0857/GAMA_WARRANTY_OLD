<?php

namespace App\CardTemplate;

class CarTemplate
{
    public function renderCarHTM()
    {
        return $output = '
        <div class="php">
            <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">產品</span>
                </div>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>無</option>
                    <option>冰盾 TPU-S7</option>
                    <option>冰盾 TPU-S8</option>
                    <option>A700</option>
                    <option>A600</option>
                    <option>A500</option>
                    <option>A400</option>
                    <option>A300</option>
                    <option>A200</option>
                    <option>A100</option>
                    <option>B35</option>
                    <option>B30</option>
                    <option>B15</option>
                    <option>B10</option>
                    <option>C350</option>
                    <option>C250</option>
                    <option>C100</option>
                    <option>CV40</option>
                    <option>CV20</option>
                    <option>C70</option>
                    <option>C60</option>
                    <option>C50</option>
                    <option>C45</option>
                    <option>C40</option>
                    <option>C30</option>
                    <option>C25</option>
                    <option>C20</option>
                    <option>C10</option>
                    <option>CP70</option>
                    <option>CP60</option>
                    <option>CP45</option>
                    <option>CP30</option>
                    <option>CP20</option>
                    <option>CP10</option>
                    <option>CARBON35</option>
                    <option>SMARTE400</option>
                    <option>E700</option>
                    <option>E600</option>
                    <option>E500</option>
                    <option>E400</option>
                    <option>E300</option>
                    <option>E200</option>
                    <option>E100</option>
                    <option>GA70</option>
                    <option>GA60</option>
                    <option>GA50</option>
                    <option>GA40</option>
                    <option>GA35</option>
                    <option>GA30</option>
                    <option>G-10</option>
                    <option>HP70</option>
                    <option>HP60</option>
                    <option>HP50</option>
                    <option>HP40</option>
                    <option>HP30</option>
                    <option>HP20</option>
                    <option>HP10</option>
                    <option>K-35</option>
                    <option>K-25</option>
                    <option>K-15</option>
                    <option>K-10</option>
                    <option>K-05</option>
                    <option>L350</option>
                    <option>LG30</option>
                    <option>LG20</option>
                    <option>LG10</option>
                    <option>LG05</option>
                    <option>LD05</option>
                    <option>N35</option>
                    <option>M35</option>
                    <option>R-10</option>
                    <option>P-16</option>
                    <option>P-36</option>
                    <option>P-100</option>
                    <option>P-300</option>
                    <option>P-350</option>
                    <option>UP70</option>
                    <option>UP60</option>
                    <option>UP45</option>
                    <option>UP30</option>
                    <option>UP20</option>
                    <option>UP10</option>
                    <option>V-14</option>
                    <option>V-37</option>
                    <option>V70</option>
                    <option>V40</option>
                    <option>V35</option>
                    <option>V14</option>
                </select>

                <div class="input-group-append">
                    <a href="#" class="btn btn-secondary minus-dp" style="width:40px">–</a>
                </div>
            </div>

            <div class="form-group pb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="前擋">
                    <label class="form-check-label" for="inlineCheckbox1">前擋</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="後擋">
                    <label class="form-check-label" for="inlineCheckbox2">後擋</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="前側檔">
                    <label class="form-check-label" for="inlineCheckbox1">前側檔</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="後側檔">
                    <label class="form-check-label" for="inlineCheckbox2">後側檔</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="左右側">
                    <label class="form-check-label" for="inlineCheckbox2">左右側</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
                    <label class="form-check-label" for="inlineCheckbox3">天窗 (disabled)</label>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(".minus-dp").click(function(){
                $(this).parent().parent().parent("div").remove();
            });
        </script>
        ';
    }
}
