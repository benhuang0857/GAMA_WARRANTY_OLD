<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif            
        </div>

        <div class="container" style="margin-top:100px; margin-bottom:100px">
            <div class="row justify-content-center">
                <div class="col-md-6" id="warranty-area">
                    <div class="form-group pb-3">
                        <svg style="width: 250px" class="tds-icon tds-icon-logo-wordmark tds-site-logo-icon" viewBox="0 0 342 35" xmlns="{{asset('GAMA-icon.png')}}" role="img" aria-hidden="true">
                            <title>GAMA</title>
                            <path d="M0 .1a9.7 9.7 0 007 7h11l.5.1v27.6h6.8V7.3L26 7h11a9.8 9.8 0 007-7H0zm238.6 0h-6.8v34.8H263a9.7 9.7 0 006-6.8h-30.3V0zm-52.3 6.8c3.6-1 6.6-3.8 7.4-6.9l-38.1.1v20.6h31.1v7.2h-24.4a13.6 13.6 0 00-8.7 7h39.9v-21h-31.2v-7h24zm116.2 28h6.7v-14h24.6v14h6.7v-21h-38zM85.3 7h26a9.6 9.6 0 007.1-7H78.3a9.6 9.6 0 007 7zm0 13.8h26a9.6 9.6 0 007.1-7H78.3a9.6 9.6 0 007 7zm0 14.1h26a9.6 9.6 0 007.1-7H78.3a9.6 9.6 0 007 7zM308.5 7h26a9.6 9.6 0 007-7h-40a9.6 9.6 0 007 7z" fill="var(--tds-icon--fill, #171a20)"></path>
                        </svg>
                        <span style="font-size: 22px; position: relative; top: 8px;">保證卡</span>
                    </div>
                    <form method="POST" action="/postwarranty">
                        @csrf
                        <div class="form-group pb-3">
                            <label for="user-email" class="pb-1">Email</label>
                            <input type="email" class="form-control" id="user-email" name="user-email" aria-describedby="emailHelp" placeholder="請輸入Email">
                        </div>
                        <div class="form-group pb-3">
                            <label for="user-mobile" class="pb-1">手機</label>
                            <input type="text" class="form-control" id="user-mobile" name="user-mobile">
                        </div>
                        <div class="form-group pb-3">
                            <label for="user-name" class="pb-1">姓名</label>
                            <input type="text" class="form-control" id="user-name" name="user-name">
                        </div>
                        <div class="form-group pb-3">
                            <label for="user-carbrand" class="pb-1">車輛品牌</label>
                            <select class="form-control" id="user-carbrand" name="user-carbrand">
                                <option>無</option>
                                <option value="Audi">Audi</option>
                                <option value="Alfa Romeo">Alfa Romeo</option>
                                <option value="Aston Martin">Aston Martin</option>
                                <option value="Am General Hummer">Am General Hummer</option>
                                <option value="Benz">Benz</option>
                                <option value="Bentley">Bentley</option>
                                <option value="BMW">BMW</option>
                                <option value="Buick">Buick</option>
                                <option value="Citroen">Citroen</option>
                                <option value="Cadillac">Cadillac</option>
                                <option value="Chrysler">Chrysler</option>
                                <option value="Daewoo">Daewoo</option>
                                <option value="Daihatsu">Daihatsu</option>
                                <option value="Dodge">Dodge</option>
                                <option value="Ford">Ford</option>
                                <option value="Ferrari">Ferrari</option>
                                <option value="FIAT">FIAT</option>
                                <option value="Formosa">Formosa</option>
                                <option value="GM">GM</option>
                                <option value="Hino">Hino</option>
                                <option value="Honda">Honda</option>
                                <option value="Hyundai">Hyundai</option>
                                <option value="Infiniti">Infiniti</option>
                                <option value="ISUZU">ISUZU</option>
                                <option value="Iveco">Iveco</option>
                                <option value="Jaguar">Jaguar</option>
                                <option value="JEEP">JEEP</option>
                                <option value="KIA">KIA</option>
                                <option value="Lamborghini">Lamborghini</option>
                                <option value="Landrover">Landrover</option>
                                <option value="Lancia">Lancia</option>
                                <option value="Lotus">Lotus</option>
                                <option value="Lincoln">Lincoln</option>
                                <option value="Lexus">Lexus</option>
                                <option value="Luxgen">Luxgen</option>
                                <option value="Mazda">Mazda</option>
                                <option value="Mitsubishi">Mitsubishi</option>
                                <option value="Smart">Smart</option>
                                <option value="Maserati">Maserati</option>
                                <option value="MINI">MINI</option>
                                <option value="Mercury">Mercury</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Opel">Opel</option>
                                <option value="Proton">Proton</option>
                                <option value="Peugeot">Peugeot</option>
                                <option value="Porsche">Porsche</option>
                                <option value="Rolls Royce">Rolls Royce</option>
                                <option value="Renault">Renault</option>
                                <option value="Suzuki">Suzuki</option>
                                <option value="Subaru">Subaru</option>
                                <option value="Ssangyong">Ssangyong</option>
                                <option value="SAAB">SAAB</option>
                                <option value="Skoda">Skoda</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Tobe">Tobe</option>
                                <option value="Tesla">Tesla</option>
                                <option value="Volkswagen">Volkswagen</option>
                                <option value="Volvo">Volvo</option>

                            </select>
                        </div>
                        <div class="form-group pb-3">
                            <label for="user-carlicense" class="pb-1">車牌號碼</label>
                            <input type="text" class="form-control" id="user-carlicense" name="user-carlicense">
                        </div>

                        <div class="form-group pb-3">
                            <label for="user-cartype" class="pb-1">車輛型式</label>
                            <select class="form-control" id="user-cartype" name="user-cartype">
                                <option>轎車</option>
                                <option>大型休旅車</option>
                                <option>小型休旅車</option>
                                <option>貨車</option>
                            </select>
                        </div>
    
                        <div class="input-group pb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">產品</span>
                            </div>
                            <select class="form-control" class="product">
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
                                <a href="#" class="btn btn-secondary plus-dp" style="width:40px">+</a>
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
    
                        <div id="dp">
                        </div>

                        <div class="form-group pb-3">
                            <label for="store" class="pb-1">施工店家</label>
                            <input type="text" class="form-control" id="store" name="store">
                        </div>

                        <div class="form-group pb-3">
                            <label for="price" class="pb-1">施工費用</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>

                        <div class="form-group pb-3">
                            <button style="width:100%" type="submit" class="btn btn-secondary btn-sm">註冊保證卡</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script>
            $('.plus-dp').click(function(){
                $.ajax({
                    type: "GET",
                    url: '/product',
                    dataType: 'html',
                    success: function (response) {
                        $('#dp').append(response);
                    },
                });
            });

            $('.minus-dp').click(function(){
                $(this).parent().remove();
            });
        </script>
    </body>
</html>
