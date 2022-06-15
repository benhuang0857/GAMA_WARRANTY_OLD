@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<style>
    .cantsee 
    {
        /* display: none; */
    }
    .modal a.close-modal
    {
        /*
        position: absolute;
        top: -1px !important;
        right: -1px !important;
        */
        display: none;
    }
</style>

<div class="container" style="margin-top:100px; margin-bottom:100px">
    <div class="row justify-content-center">
        <div class="col-md-6" id="warranty-area">
            <form method="POST" action="#" id="warranty_code" class="shadow_box" style="padding: 10px;">
                @csrf
                <div class="form-group pb-3">
                    <label for="check-code" class="pb-1">請先填寫保卡號碼</label>
                    <span id="check_status">
                    </span>
                    <input type="text" class="form-control" id="check-code" name="check-code" placeholder="保卡號碼" required>
                    <a href="#" class="btn btn-primary" id="pre" style="margin-top: 5px">上一步</a>
                    <a href="#" class="btn btn-primary" id="next" style="margin-top: 5px">下一步</a>
                </div>
                <div id="lockit" class="cantsee">
                    <div class="form-group pb-3">
                        <label for="user-email" class="pb-1">Email</label>
                        <input type="email" class="form-control" id="user-email" name="user-email" aria-describedby="emailHelp" placeholder="請輸入Email" value="{{$Data['Auth']->email}}" required readonly>
                    </div>
                    <div class="form-group pb-3">
                        <label for="user-mobile" class="pb-1">手機</label>
                        <input type="text" class="form-control" id="user-mobile" name="user-mobile" value="{{$Data['Auth']->mobile}}" required readonly>
                    </div>
                    <div class="form-group pb-3">
                        <label for="user-name" class="pb-1">姓名</label>
                        <input type="text" class="form-control" id="user-name" name="user-name" value="{{$Data['Auth']->name}}" required readonly>
                    </div>
                    <div class="form-group pb-3">
                        <label for="user-address" class="pb-1">住址</label>
                        <input type="text" class="form-control" id="user-address" name="user-address" value="{{$Data['Auth']->address}}" required>
                    </div>
                    <div class="form-group pb-3">
                        <label for="floor-num" class="pb-1">樓層</label>
                        <input type="text" class="form-control" id="floor-num" name="floor-num" required>
                    </div>

                    <!-- pass json body start -->
                    <div id="product-group">
                        <div id="product_response">

                        </div>

                        <div id="dp">
                        </div>
                    </div>

                    <!-- pass json body end -->

                    <div class="form-group pb-3">
                        <label for="store" class="pb-1">施工店家</label>
                        <select class="form-control" id="store" name="store" required>
                            @foreach ($Data['AllStores'] as $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group pb-3">
                        <label for="construction_date" class="pb-1">施工完成日期</label>
                        <input type="date" class="form-control" id="construction_date" name="construction_date">
                    </div>

                    <div class="form-group pb-3">
                        <label for="price" class="pb-1">施工費用</label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>

                    <div class="form-group pb-3">
                        <label for="recommand" class="pb-1">推薦人代碼</label>
                        <input type="text" class="form-control" id="recommand" name="recommand" value="{{$Data['Recommand']}}">
                    </div>
                    <div class="form-group pb-3">
                        <a style="width:100%" type="submit" class="btn btn-secondary btn-sm" id="pass">註冊保證卡</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- AJAX response must be wrapped in the modal's root class. -->
    <div class="modal" id="myModal" style="height: 620px; overflow-y: overlay; padding-top: 40px; padding-left: 15px; padding-right: 15px;">
        <div>
            <ul style="padding: 0px;">
                <div>
                    <h3><strong>GAMA翠光隔熱紙</strong></h3><br>
                    <strong style="font-size: 18px"><span>為了能使用本服務，您同意以下事項：</span></strong><br>
                    <ul>
                        <li style="font-size: 16px">於本線上保固卡申請系統內提供您本人正確、最新及完整的資料。</li>
                        <li style="font-size: 16px">若您提供任何錯誤、不實或不完整的資料， <strong style="color:brown">GAMA有權終止您的保固服務。</strong></li>
                        <li style="font-size: 16px">請完整並妥善保存您的車主保留聯或回執聯以便在保固服務產生時提出。</li>
                        <li style="font-size: 16px">實施保固服務時，GAMA有權以實際鑑定的隔熱紙情況作適當處理。
                            <strong style="color:brown">當您使用本服務時，即表示您已閱讀、瞭解並同意接受本服務條款之所有內容。</strong></li>
                        <li style="font-size: 16px">
                            本保證書因個人資料使用授權同意書，本人茲授權臺灣柯美股份有限公司，為促進個人資料之合理利用，並依「個人資料保護法」及其他相關法規有效管理、處理個人資料，同意臺灣柯美股份有限公司基於特定目的儲存、建檔、轉介、運用、處理本人所提供之各項資料，其資料並得於電磁紀錄物或其他類似媒體永久保存及利用。特立此書。
                        </li>
                    </ul>
                </div>
            </ul>
            <div>
                <a href="#" class="btn btn-primary" style="width:100%" rel="modal:close">確定</a>
            </div>
            
         </div>
    </div>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    //var warranty_type = 'SUN';
    /*
    $("#reload").hide();
    $("#SUN").hide();
    $("#BUILDING").hide();
    $("#warranty_code").hide();
    $("#SUN").click(function(){
        warranty_type = 'SUN';
        $.ajax({
            type: "GET",
            url: '/get_response_product',
            data: {
                'type': warranty_type,
            },
            dataType: 'html',
            success: function (response) {
                $("#product_response").html(response);
            }
        });
        $("#warranty_code").show('slow');
        $("#warranty_type").hide('slow');
        
    });
    $("#CPF").click(function(){
        warranty_type = 'CPF';

        $.ajax({
            type: "GET",
            url: '/get_response_product',
            data: {
                'type': warranty_type,
            },
            dataType: 'html',
            success: function (response) {
                $("#product_response").html(response);
            }
        });
        $("#warranty_code").show('slow');
        $("#warranty_type").hide('slow');
    });
    $("#BATTERY").click(function(){
        warranty_type = 'BATTERY';

        $.ajax({
            type: "GET",
            url: '/get_response_product',
            data: {
                'type': warranty_type,
            },
            dataType: 'html',
            success: function (response) {
                $("#product_response").html(response);
            }
        });
        $("#warranty_code").show('slow');
        $("#warranty_type").hide('slow');
    });

    $("#FILM").click(function(){
        $("#CPF").hide();
        $("#ENVELOPE").hide();
        $("#BATTERY").hide();
        $("#FILM").hide();
        $("#SUN").show('slow');
        $("#BUILDING").show('slow');
        $("#reload").show('slow');
    });

    $("#reload").click(function(){
        location.reload();
    });

    $("#pre").click(function(){
        $("#warranty_code").hide('slow');
        $("#warranty_type").show('slow');
    });

    // 檢查碼填寫後檢查
    $("#next").on('click', function(){
        $.ajax({
            type: "GET",
            url: '/check_code',
            data: {
                'check_code': $('#check-code').val(),
            },
            dataType: 'html',
            success: function (response) {
                if(response == 'pass')
                {
                    $("#lockit").removeClass("cantsee");
                    $("#check_status").html('<i class="fas fa-check-circle" style="color: green"></i>');
                }
                else
                {
                    $("#lockit").addClass("cantsee");
                    $("#check_status").html('<i class="fas fa-info-circle" style="color: red"></i>');
                }
            }
        });
    });

    $('#pass').click(function()
    {
        var passFlag = true;
        var product_group = $('#product-group :input').serializeArray();
        
        $("input[type='text']").each(function() {
            if ($(this).val() == "") {
                passFlag = false;
            }
        });

        for(var i=0; i<product_group.length; i++)
        {
            if (product_group[i]['value'] == "none") {
                passFlag = false;
            }
        }
 
        if( $('#construction_date').val() == '' )
        {
            Swal.fire({
                icon: 'error',
                confirmButtonColor: 'red',
                title: '請填寫施工日完成日期',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
            passFlag = false;
        }

        if( product_group.length < 2 || product_group[0]['value'] == 'none')
        {
            Swal.fire({
                icon: 'error',
                confirmButtonColor: 'red',
                title: '請選擇產品並且勾選施工位置',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
            passFlag = false;
        }

        if(passFlag == false)
        {
            Swal.fire({
                icon: 'error',
                confirmButtonColor: 'red',
                title: '所有欄位請都填寫完畢再送出',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
        }
        else
        {
            passData(passFlag, product_group);
        }
    });

    function passData(passFlag, product_group)
    {
        if(passFlag == true)
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: '/postwarranty',
                data: {
                    'check_code': $('#check-code').val(),
                    'user_name': $('#user-name').val(),
                    'user_mobile': $('#user-mobile').val(),
                    'user_email': $('#user-email').val(),
                    'user_address': $('#user-address').val(),
                    'user_carlicense': $('#user-carlicense').val(),
                    'user_carbrand': $('#user-carbrand').val(),
                    'user_carname': $('#user-carname').val(),
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
    }
    */
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script>
    // $("#myModal").modal();
</script>
@endsection