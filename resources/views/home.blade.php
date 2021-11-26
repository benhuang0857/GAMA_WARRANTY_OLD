@extends('layouts.app')

@section('content')

<style>
    .shadow_box_2
    {
        background: white;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
</style>

<div class="container">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row justify-content-center shadow_box_2" style="margin-bottom:30px ">
        <div class="col-lg">
            <div class="white-box analytics-info">
                <h3 class="box-title">GAMA POINT</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li onclick="play()">
                        <i class="material-icons md-48" style="font-size:48px ;color: rgb(255, 225, 52)">monetization_on</i>
                        <audio id="audio" src="{{asset('sound/coin_sound.mp3')}}"></audio>
                    </li>
                    <li class="ms-auto"><span class="counter text-purple">{{$Data['User']->gama_point}}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row justify-content-center shadow_box_2" style="margin-bottom:30px ">
        <div class="col-lg">
            <div class="white-box analytics-info">
                <label class="col-md-12 p-0">分享連結</label>
                <div class="input-group mb-3">
                    <input type="text" value="{{$Data['Recommand_URL']}}" id="recommand_url" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" onclick="myFunction()">複製連結</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center shadow_box_2" style="margin-bottom:30px ">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material">
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">姓名</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" value="{{$Data['User']->name}}" readonly> 
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" value="{{$Data['User']->email}}" readonly>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">手機</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" value="{{$Data['User']->mobile}}" readonly>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">住址</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" value="{{$Data['User']->address}}" readonly>
                            </div>
                        </div>

                        <div class="form-group pb-3">
                            <a href="/edit_profile" style="width:100%" type="submit" class="btn btn-secondary btn-sm pass">修改資料</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="background: rgba(0, 0, 0, 0.417)">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="height: 800px; overflow-x: hidden; 
    overflow-y: auto; color:white; background:rgb(0, 0, 0)">
    <button style="position: absolute;
        width:25px;
        border-radius: 100%;
        background: black;
        color: white;
        border: solid 0px;" 
        type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
        <img src="{{asset('images/site/box.png')}}" width="30px" alt=""
        style="display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 20px;
        ">
        <div class="modal-header" style="margin: auto">
        <h5>寶箱</h5>
        
        </div>
        <div class="modal-body">
            <div style="text-align: left">
                <p>
                    在您選擇GAMA翠光產品的同時，您也享有最尊貴的禮遇。感謝您選擇GAMA翠光產品，我們相信對於舒適以及生活品味的追求，您一定會有全新的定義。品質保證是我們的自我期許，關於GAMA隔熱膜的品質，請您務必遵守，「照顧並且保養GAMA隔熱膜的秘訣」。此產品非屬永恆性產品，若用於建築上會因使用條件同而影響效能，保固期限請參考臺灣柯美股份有限公司所提供之建議。歡迎加入GAMA之友即可有機會獲的免費的施工卷、折價卷及新品試用的機會。
                </p>
                <p>
                    When you choose GAMA products, you also enjoy the most noble courtesy. Thank you for choosing GAMA. We believe that you will have a new definition of the pursuit of comfort and lifestyle. Quality assurance is our self-expectation. Regarding the quality of GAMA insulation film, please be sure to follow, "The secret to care and maintenance of GAMA insulation film." This product is not a timeless product. If used in construction, the performance will be affected due to the same conditions of use. For the warranty period, please refer to the recommendations provided by Taiwan GAMA Co., Ltd. Welcome to join the Friends of GAMA to get free construction coupons, discount coupons and new product trial opportunities.
                </p>
            </div>
            <button style="width:100%; font-size: 21px; margin-bottom:20px" class="btn btn-outline-secondary" type="button" onclick="myFunction()">複製推薦碼連結</button>
            <button style="width:100%; font-size: 21px; margin-bottom:20px" class="btn btn-outline-secondary" type="button" onclick="myFunction()">Share Link</button>
            <!--<button style="width:100%" class="btn btn-outline-secondary" type="button">我的推薦人</button>-->
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
    $("#exampleModalCenter").modal();
</script>

@endsection