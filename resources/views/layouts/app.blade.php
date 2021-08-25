<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GAMA') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600">
    <link rel="stylesheet" href="{{asset('assets/fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Footer-Basic.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/img/logo.svg')}}" type="image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <section class="d-flex flex-column justify-content-between" id="hero">
        <div id="hero-top">
            <nav class="navbar navbar-light navbar-expand-lg">
                <div class="container-fluid"><a class="navbar-brand" href="#hero" style="background: url(&quot;assets/img/logo.svg&quot;) center / 80% no-repeat;width: 130px;font-size: 13px;"></a>
                    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1" style="font-size: 13px;font-family: Montserrat, sans-serif;font-weight: 600;text-transform: uppercase; background: rgba(255, 255, 255, 0.7);padding: 10px; border-radius: 6px;">
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav mx-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item"><a class="nav-link active nav_hover" href="#" target="_blank">您的保固資訊<br></a></li>
                                <li class="nav-item"><a class="nav-link active nav_hover" href="#" target="_blank">GAMA點數<br></a></li>
                                <li class="nav-item"><a class="nav-link active nav_hover" href="#" target="_blank">商城<br></a></li>
                                <li class="nav-item"><a class="nav-link active nav_hover" href="#" target="_blank">個人資料<br></a></li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <h1 class="text-center" data-aos="fade-up" data-aos-duration="650" data-aos-once="true" id="title" style="font-size: 22px;">Tesla</h1>
            <h2 class="text-center" data-aos="fade-up" data-aos-duration="700" data-aos-once="true" id="subtitle" style="font-size: 40px;font-family: Montserrat, sans-serif;">Roadster</h2>
        </div>

        @yield('content')

        <div id="hero-bottom">
            <div class="container" style="max-width: 700px;height:  ;">
                <div class="row">
                    <div class="col-8 offset-2" id="alignP">
                        <p style="font-weight: 500;font-family: Montserrat, sans-serif;margin-bottom: 0;"><br>​The quickest car in the world, with record-setting acceleration, range and performance.<br><br></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col" data-aos="fade" data-aos-delay="400" data-aos-once="true">
                        <p id="p-top" style="font-size: 26px;font-weight: bold;font-family: Montserrat, sans-serif;margin-bottom: 0;"><i class="icon ion-speedometer"></i>&nbsp;1.9s</p>
                        <p id="p-bottom" style="font-size: 13px;">0-60 mph</p>
                    </div>
                    <div class="col with-borders" data-aos="fade" data-aos-delay="500" data-aos-once="true">
                        <p id="p-top-1" style="font-size: 26px;font-weight: bold;font-family: Montserrat, sans-serif;margin-bottom: 0;">+250mph</p>
                        <p id="p-bottom-1" style="font-size: 13px;">Top Speed</p>
                    </div>
                    <div class="col" data-aos="fade" data-aos-delay="600" data-aos-once="true">
                        <p id="p-top-2" style="font-size: 26px;font-weight: bold;font-family: Montserrat, sans-serif;margin-bottom: 0;">620mi</p>
                        <p id="p-bottom-2" style="font-size: 13px;">Mile Range</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
