<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>保證卡系統</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body>
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
                            <input type="email" class="form-control" id="user-email" name="user-email" aria-describedby="emailHelp" placeholder="請輸入Email" required>
                        </div>
                        <div class="form-group pb-3">
                            <label for="user-mobile" class="pb-1">手機</label>
                            <input type="text" class="form-control" id="user-mobile" name="user-mobile" required>
                        </div>
                        <div class="form-group pb-3">
                            <label for="user-name" class="pb-1">姓名</label>
                            <input type="text" class="form-control" id="user-name" name="user-name" required>
                        </div>
                        <div class="form-group pb-3">
                            <label for="user-address" class="pb-1">住址</label>
                            <input type="text" class="form-control" id="user-address" name="user-address" required>
                        </div>
                        <div class="form-group pb-3">
                            <label for="user-carlicense" class="pb-1">車牌號碼</label>
                            <input type="text" class="form-control" id="user-carlicense" name="user-carlicense" required>
                        </div>
                        <div class="form-group pb-3">
                            <label for="user-carbrand" class="pb-1">車輛品牌</label>
                            <select class="form-control" id="user-carbrand" name="user-carbrand" required>
                                <option value="none">無</option>
                                @foreach ($Data['Brands'] as $Brand)
                                <option value="{{$Brand->name}}">{{$Brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pb-3">
                            <label for="warranty-type" class="pb-1">型式</label>
                            <select class="form-control" id="warranty-type" name="warranty-type" required>
                                <option>轎車</option>
                                <option>大型休旅車</option>
                                <option>小型休旅車</option>
                                <option>貨車</option>
                            </select>
                        </div>

                        <!-- pass json body start -->
                        <div id="product-group">
                            <div class="input-group pb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">產品</span>
                                </div>
                                <select class="form-control" class="product" name="product-1" required>
                                    <option value="none">無</option>
                                    @foreach ($Data['Products'] as $Product)
                                    <option value="{{$Product->name}}">{{$Product->name}}</option>
                                    @endforeach
                                </select>
                    
                                <div class="input-group-append">
                                    <a class="btn btn-secondary plus-dp" style="width:40px">+</a>
                                </div>
                            </div>

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
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="前側檔" name="construction-site-1">
                                    <label class="form-check-label" for="inlineCheckbox1">前側檔</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="後側檔" name="construction-site-1">
                                    <label class="form-check-label" for="inlineCheckbox2">後側檔</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="左右側" name="construction-site-1">
                                    <label class="form-check-label" for="inlineCheckbox2">左右側</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="天窗" name="construction-site-1">
                                    <label class="form-check-label" for="inlineCheckbox3">天窗</label>
                                </div>
                            </div>

                            <div id="dp">
                            </div>
                        </div>

                        <!-- pass json body end -->

                        <div class="form-group pb-3">
                            <label for="store" class="pb-1">施工店家</label>
                            <input type="text" class="form-control" id="store" name="store">
                        </div>

                        <div class="form-group pb-3">
                            <label for="price" class="pb-1">施工費用</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>

                        <div class="form-group pb-3">
                            <label for="recommand" class="pb-1">推薦人</label>
                            <input type="text" class="form-control" id="recommand" name="recommand" value="{{$Data['Recommand']}}" readonly>
                        </div>

                        <div class="form-group pb-3">
                            <a style="width:100%" type="submit" class="btn btn-secondary btn-sm" id="pass">註冊保證卡</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            var i = 2;
            $('.plus-dp').click(function(){
                $.ajax({
                    type: "GET",
                    url: '/product',
                    data: {
                        'num': i
                    },
                    dataType: 'html',
                    success: function (response) {
                        $('#dp').append(response);
                        i++;
                    },
                });
            });

            $('.minus-dp').click(function(){
                $(this).parent().remove();
            });

            $('#pass').click(function(){

                var fill_all = false;
                $('input[type="text"]').each(function() {
                    if ($(this).val() == "") {
                        Swal.fire({
                            icon: 'error',
                            confirmButtonColor: 'red',
                            title: '請填寫表單欄位',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        })
                        fill_all = false;
                    }
                    else
                    {
                        fill_all = true;
                    }
                    
                });

                if(fill_all == true){
                    var product_group = $('#product-group :input').serializeArray();
                    console.log(product_group);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: '/postwarranty',
                        data: {
                            'user_name': $('#user-name').val(),
                            'user_mobile': $('#user-mobile').val(),
                            'user_email': $('#user-email').val(),
                            'user_address': $('#user-address').val(),
                            'user_carlicense': $('#user-carlicense').val(),
                            'user_carbrand': $('#user-carbrand').val(),
                            'warranty_type': $('#warranty-type').val(),
                            'store': $('#store').val(),
                            'price': $('#price').val(),
                            'recommand': $('#recommand').val(),
                            'product_group': product_group,
                        },
                        dataType: 'html',
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                confirmButtonColor: '#6c757d',
                                title: '保證卡註冊成功',
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                }
                            })
                        },
                    });
                }

            });
        </script>
    </body>
</html>
