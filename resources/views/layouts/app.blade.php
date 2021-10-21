<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="description" content="GAMA,g,a,m,a,TSLA,特斯拉,Tesla Model 3,Tesla Model S,Tesla Model X,隔熱紙,汽車隔熱紙,大樓隔熱紙,防爆安全隔熱,建築膜,建築隔熱紙,隔熱,紅外線,紫外線,特斯拉隔熱紙,防曬,美白,GAMA翠光,GAMA超強防晒膜,地表上最強的隔熱紙,高檔隔熱紙,抗熱隔熱膜,好的隔熱紙,旗艦級隔熱紙,頂級隔熱紙,無毒隔熱紙,無毒隔熱膜,翠光防爆膜,翠光隔熱紙,GAMA,GAMA防爆膜,GAMA隔熱紙,汽車前檔隔熱紙,天窗隔熱紙,隔熱紙推薦,隔熱率高,透視力高,視線清晰,無毒認證,不影響tag,隔紅外線,隔紫外線,護眼,陽光造成傷害,保護皮膚,保護眼睛,保護汽車內裝,車內無毒環境,旅遊推薦,露營,省油,新車首選,新車必備,推薦,買車,出遊,防護,肌膚老化,保固最長,隔熱紙評比,隔熱紙價格,臺北隔熱紙,臺中隔熱紙,高雄隔熱紙,南港隔熱紙,汐止隔熱紙,汐止汽車玻璃,經銷商,隔熱紙總代理">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="GAMA,g,a,m,a,TSLA,特斯拉,Tesla Model 3,Tesla Model S,Tesla Model X,隔熱紙,汽車隔熱紙,大樓隔熱紙,防爆安全隔熱,建築膜,建築隔熱紙,隔熱,紅外線,紫外線,特斯拉隔熱紙,防曬,美白,GAMA翠光,GAMA超強防晒膜,地表上最強的隔熱紙,高檔隔熱紙,抗熱隔熱膜,好的隔熱紙,旗艦級隔熱紙,頂級隔熱紙,無毒隔熱紙,無毒隔熱膜,翠光防爆膜,翠光隔熱紙,GAMA,GAMA防爆膜,GAMA隔熱紙,汽車前檔隔熱紙,天窗隔熱紙,隔熱紙推薦,隔熱率高,透視力高,視線清晰,無毒認證,不影響tag,隔紅外線,隔紫外線,護眼,陽光造成傷害,保護皮膚,保護眼睛,保護汽車內裝,車內無毒環境,旅遊推薦,露營,省油,新車首選,新車必備,推薦,買車,出遊,防護,肌膚老化,保固最長,隔熱紙評比,隔熱紙價格,臺北隔熱紙,臺中隔熱紙,高雄隔熱紙,南港隔熱紙,汐止隔熱紙,汐止汽車玻璃,經銷商,隔熱紙總代理">
    <meta name="robots" content="noindex,nofollow">
    <title>GAMA 保卡系統</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('ample/plugins/images/favicon.png')}}">
    <!-- Custom CSS -->
    <link href="{{asset('ample/plugins/bower_components/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('ample/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}">
    <!-- Custom CSS -->
    <link href="{{asset('ample/css/style.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
</head>
<style>
    .page-wrapper {
        background:linear-gradient(75deg,#aaa9ab, white);
        position: relative;
        /*background-image: url('/images/site/GAMA_BG.png') no-repeat center;*/   
    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
        height: 50%;
    }

    .shadow_box
    {
        background: white;
        border-radius: 10px;
        padding: 5px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    .btn-primary
    {
        background: #192471 !important;
        border: #192471 !important;
    }

</style>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6" style="background: gray">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="home">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="{{asset('images/site/LOGO.png')}}" width="115" style="padding: 10px" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->

            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul class="sidebarnav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link"  href="/point_products_show" aria-expanded="false">
                                    <i class="fas fa-gift" aria-hidden="true"></i>
                                    <span class="hide-menu">Gama禮品</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('login') }}" aria-expanded="false">
                                    <i class="fas fa-bolt" aria-hidden="true"></i>
                                    <span class="hide-menu">{{ __('Login') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('register') }}" aria-expanded="false">
                                    <i class="far fa-registered" aria-hidden="true"></i>
                                    <span class="hide-menu">{{ __('Register') }}</span>
                                </a>
                            </li>
                        @else
                            @if (Auth::user()->status == 'ON')
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"  href="#" aria-expanded="false">
                                        <i class="fa fa-diamond" aria-hidden="true">G+</i>
                                        <span class="hide-menu">GAMA點數：{{Auth()->user()->gama_point}}</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"  href="/home" aria-expanded="false">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span class="hide-menu">個人資料</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"  href="/warranty" aria-expanded="false">
                                        <i class="fas fa-clipboard-check" aria-hidden="true"></i>
                                        <span class="hide-menu">保卡申請</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"  href="/point_products" aria-expanded="false">
                                        <i class="fas fa-gift" aria-hidden="true"></i>
                                        <span class="hide-menu">申請兌換禮品</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/my_warranty" aria-expanded="false">
                                        <i class="fas fa-window-maximize" aria-hidden="true"></i>
                                        <span class="hide-menu">您的保固資訊</span>
                                    </a>
                                </li>
                            @endif

                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
                                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                    <span class="hide-menu">{{ __('Logout') }}</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <div class="container-fluid">
                @yield('content')
            </div>

            <footer class="footer text-center"> 2021 © <a
                    href="#">GAMA</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('ample/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('ample/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('ample/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('ample/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('ample/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('ample/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('ample/js/custom.js')}}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function myFunction() {
            /* Get the text field */
            var copyText = document.getElementById("recommand_url");
        
            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
        
            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

            Swal.fire({
                icon: 'success',
                confirmButtonColor: '#6c757d',
                title: '複製成功',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        }
        function play() {
            var audio = document.getElementById("audio");
            audio.play();
        }

        function myFunction_mobile() {
            /* Get the text field */
            var copyText = document.getElementById("recommand_url");
        
            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
        
            /* Copy the text inside the text field */
            //navigator.clipboard.writeText(copyText.value);

            if (navigator.share) {
            navigator.share({
                title: 'GAMA點數大放送',
                text: copyText.value,
                url: copyText,
            })
                .then(() => console.log('成功！'))
                .catch((error) => console.log('發生錯誤', error));
            }
        }

    </script>
</body>

</html>