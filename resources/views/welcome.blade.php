@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:100px; margin-bottom:100px">
    <div class="row justify-content-center">
        <div class="col-md-6" id="warranty-area">
            <div class="form-group pb-3">
                <h2>GAMA
                <span style="font-size: 22px;">保證卡</span>
                </h2>
            </div>
            <form method="POST" action="/postwarranty">
                @csrf
                <div class="form-group pb-3">
                    <label for="user-email" class="pb-1">Email</label>
                    <input type="email" class="form-control" id="user-email" name="user-email" aria-describedby="emailHelp" placeholder="請輸入Email" value="{{$Data['Auth']->email}}" required>
                </div>
                <div class="form-group pb-3">
                    <label for="user-mobile" class="pb-1">手機</label>
                    <input type="text" class="form-control" id="user-mobile" name="user-mobile" value="{{$Data['Auth']->mobile}}" required>
                </div>
                <div class="form-group pb-3">
                    <label for="user-name" class="pb-1">姓名</label>
                    <input type="text" class="form-control" id="user-name" name="user-name" value="{{$Data['Auth']->name}}" required>
                </div>
                <div class="form-group pb-3">
                    <label for="user-address" class="pb-1">住址</label>
                    <input type="text" class="form-control" id="user-address" name="user-address" value="{{$Data['Auth']->address}}" required>
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
                    <label for="construction_date" class="pb-1">施工完成日期</label>
                    <input type="date" class="form-control" id="construction_date" name="construction_date">
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
                    'construction_date': $('#construction_date').val(),
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
                    }).then((result) =>{
                        window.location.reload();
                    });
                    
                },
            });
        }

    });
</script>
@endsection