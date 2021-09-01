@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container" style="margin-top:100px; margin-bottom:100px">
    <div class="row justify-content-center">
        <div class="col-md-6" id="warranty-area">
            <div class="form-group pb-3">
                <h2>
                    申請兌換充電里程
                </h2>
            </div>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('images/site/better.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">華辰點數5000點</h5>
                    <p class="card-text">價格：500 GAMA點數</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        使用GAMA點數購買
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">購買5000點</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/transpoint">
                            @csrf
                            <input  type="text" class="form-control" id="user-uniqid" name="user-uniqid" value="{{Auth()->user()->uniqid}}">
                            <div class="form-group pb-3">
                                <label for="product-name" class="pb-1">商品名稱</label>
                                <input type="text" class="form-control" id="product-name" name="product-name" value="兌換5000點充電點數" readonly>
                            </div>
                            <div class="form-group pb-3">
                                <label for="user-mobile" class="pb-1">手機(華城手機APP註冊號)</label>
                                <input type="text" class="form-control" id="user-mobile" name="user-mobile" value="{{Auth()->user()->mobile}}" required>
                            </div>
                            <div class="form-group pb-3">
                                <label for="user-name" class="pb-1">姓名</label>
                                <input type="text" class="form-control" id="user-name" name="user-name" value="{{Auth()->user()->name}}" required>
                            </div>
                            <div class="form-group pb-3">
                                <label for="price" class="pb-1">GAMA點數兌換</label>
                                <input type="number" class="form-control" id="price" name="price" value="500" readonly>
                            </div>
                            <div class="form-group pb-3">
                                <a style="width:100%" type="submit" class="btn btn-secondary btn-sm" id="pass">確認兌換</a>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
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
                url: '/transpoint',
                data: {
                    'user_uniqid': $('#user-uniqid').val(),
                    'user_name': $('#user-name').val(),
                    'user_mobile': $('#user-mobile').val(),
                    'product_name': $('#product-name').val(),
                    'price': $('#price').val(),
                },
                dataType: 'html',
                success: function (response) {
                    if(response == 'error')
                    {
                        Swal.fire({
                            icon: 'error',
                            confirmButtonColor: '#6c757d',
                            title: '失敗',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        }).then((result) =>{
                            window.location.reload();
                        });
                    }
                    else
                    {
                        Swal.fire({
                            icon: 'success',
                            confirmButtonColor: '#6c757d',
                            title: '兌換成功',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        }).then((result) =>{
                            window.location.reload();
                        });
                    }
                },
            });
        }
    });
</script>

@endsection