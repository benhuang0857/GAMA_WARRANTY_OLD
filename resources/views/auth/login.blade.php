@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center shadow_box">
        <img src="{{asset('/images/site/BIG_GAMA.png')}}" class="center" alt="">
        <h3 style="text-align: center">歡迎進入GAMA推薦專區</h3><br>
        <h3 style="text-align: center">Welcome to GAMA recommand area</h3>

        <div style="width: 100%; padding:6px; background:rgb(245, 153, 32);color:white;text-align: center">LOGIN</div>

        <div class="col-md-8" style="margin: 0px">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">密碼(Password)</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        記住我
                                    </label>
                                </div>
                            </div>
                        </div>
                        -->

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    登入(Login)
                                </button>

                                <a class="btn btn-primary" href="{{ route('register') }}">
                                    註冊(Sign up)
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="welcome">
                <h3>恭喜您選擇GAMA翠光產品</h3>
                在您選擇GAMA翠光產品的同時，您也享有最尊貴的禮遇。<br>
                感謝您選擇GAMA翠光產品，我們相信，對於舒適以及生活品味的追求，您一定會有全新的定義。<br>
                品質保證是我們的自我期許，關於GAMA隔熱膜的品質，請您務必遵守，「照顧並且保養GAMA隔熱膜的秘訣」。<br>
                此產品非屬永恆性產品，若用於建築上會因使用條件同而影響效能，保固期限請參考興展科技總代理所提供之建議。<br>
                歡迎加入GAMA之友即可有機會獲的免費的施工卷、折價卷及新品試用的機會<br>
                <ul>
                    <li>FB :www.facebook.com/GREENGAMA</li>
                    <li>LINE ID : @gamagroup</li>
                    <li>WECHAT ID : gama-service</li>
                </ul>
                照顧GAMA隔熱膜的秘訣<br>
                <ul>
                    <li>當完GAMA隔熱膜的黏貼後，請勿在48小時內搖下車窗。</li>
                    <li>為了確保GAMA隔熱膜與玻璃的密合度，請勿在七天內洗車</li>
                    <li>請勿使用酒精以及氨水類的清潔劑，或使用磨砂紙來清洗GAMA隔熱膜，請使用溫水及布料擦拭。</li>
                    <li>請勿在GAMA隔熱膜上黏貼任何貼紙或是相關膠著類物質。</li>
                    <li>請勿接觸隔熱膜與玻璃的邊緣黏貼處，這可能會導致隔熱紙脫落。</li>
                    <li>再黏貼GAMA隔熱膜之後，或許在玻璃上會出現些微「霧狀」，這是正常現象並且會在四至十周內消失，同時假設發生小氣泡，也會逐漸消失。</li>
                    <li>如果接縫線出現在彎曲的車窗上，請以多層連接的方式來達成您對美觀的要求。</li>
                </ul>

                <h3>Congratulations on choosing GAMA Cuiguang products.</h3><br>
                When you choose GAMA Cuiguang products, you also enjoy the most noble courtesy.
                Thank you for choosing GAMA Cuiguang products. We believe that you will have a new definition of the pursuit of comfort and life taste.
                Quality assurance is our self-permission. Regarding the quality of GAMA insulation film, please abide by the "care and maintenance of the secrets of GAMA insulation film".
                This product is not a permanent product. If it is used in architecture, it will affect the efficiency due to the same use conditions. Please refer to the recommendation provided by the general agent of Xingzhan Technology for the warranty period.
                Welcome to join Friends of GAMA to get free construction rolls, discount coupons and new product trial opportunities.<br>
                <br>
                <ul>
                    <li>FB :www.facebook.com/GREENGAMA</li>
                    <li>LINE ID : @gamagroup</li>
                    <li>WECHAT ID : gama-service</li>
                </ul>
                Take care of the secret of GAMA insulation film<br>
                <ul>
                    <li>After sticking to the GAMA insulation film, please do not close the window within 48 hours.</li>
                    <li>To ensure the tightness between the GAMA insulation film and the glass, please do not wash the car within seven days.</li>
                    <li>Please do not use alcohol and ammonia cleaning, or scrub paper to clean the GAMA insulation film. Please wipe it with warm water and cloth.</li>
                    <li>Please do not stick any stickers or related materials to the GAMA insulation film.</li>
                    <li>Please do not touch the edge of the insulation film and the glass, which may cause the insulation paper to fall off.</li>
                    <li>After sticking to the GAMA insulation film, there may be some slight "symptoms" on the glass, which is normal and will disappear within four to ten weeks. At the same time, it is assumed that small bubbles will disappear gradually.</li>
                    <li>If the wiring appears on the curved window, please meet your aesthetic requirements in a multi-layer connection.</li>
                </ul>

            </div>
            <img src="{{asset('/images/site/LOGIN_FAM_PIC.jpeg')}}" width="100%" alt="">
        </div>
    </div>
</div>
<div class="container">
    
</div>
@endsection
