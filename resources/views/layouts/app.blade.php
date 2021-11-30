<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="description" content="在您選擇GAMA翠光產品的同時，您也享有最尊貴的禮遇。感謝您選擇GAMA翠光產品，我們相信對於舒適以及生活品味的追求，您一定會有全新的定義。品質保證是我們的自我期許，關於GAMA隔熱膜的品質，請您務必遵守，「照顧並且保養GAMA隔熱膜的秘訣」。此產品非屬永恆性產品，若用於建築上會因使用條件同而影響效能，保固期限請參考臺灣柯美股份有限公司所提供之建議。歡迎加入GAMA之友即可有機會獲的免費的施工卷、折價卷及新品試用的機會。">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="在您選擇GAMA翠光產品的同時，您也享有最尊貴的禮遇。感謝您選擇GAMA翠光產品，我們相信對於舒適以及生活品味的追求，您一定會有全新的定義。品質保證是我們的自我期許，關於GAMA隔熱膜的品質，請您務必遵守，「照顧並且保養GAMA隔熱膜的秘訣」。此產品非屬永恆性產品，若用於建築上會因使用條件同而影響效能，保固期限請參考臺灣柯美股份有限公司所提供之建議。歡迎加入GAMA之友即可有機會獲的免費的施工卷、折價卷及新品試用的機會。">
    <title>GAMA商城</title>
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