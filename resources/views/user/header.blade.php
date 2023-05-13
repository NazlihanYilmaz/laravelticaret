<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',"Ticaret Sitesi")</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('user')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('user')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('user')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('user')}}/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{asset('user')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('user')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('user')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('user')}}/css/style.css" type="text/css">
    <link rel="stylesheet" href="{{asset('user')}}/css/easycard.min.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- form customized style -->
	<style type="text/css">
	.card-header-custom{
		background: linear-gradient(135deg, rgba(191,13,48,1) 0%, rgba(255,84,121,1) 38%, rgba(191,13,48,1) 100%);
		color: #fff;
		font-weight: bold;
	}
	.btn-custom{
		background: linear-gradient(135deg, rgba(8,75,94,1) 0%, rgba(20,108,140,1) 34%, rgba(3,47,59,1) 96%, rgba(3,47,59,1) 100%);
		width: 100%;
		color: #fff;
		cursor: pointer;
	}
	</style>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
            @if(!Auth::guard('user')->check())
                            <a href="{{route('userlogin')}}">Giriş Yap</a>
                            <a href="{{route('useregister')}}">Kayıt Ol</a>
                            
                            @endif
            </div>
            @if(Auth::guard('user')->check())
            <div class="offcanvas__top__hover">
            <span>{{$usergenel->ad}} {{$usergenel->soyad}} <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li><a style="color:white" href="{{route('siparis')}}">Siparişlerim</a></li>
                                    <li><a style="color:white" href="{{route('uyeler.edit',$usergenel->no)}}">Ayarlar</a></li>
                                    <li><a style="color:white" href="{{route('userlogout')}}">Çıkış Yap</a></li>
                                   
                                </ul>
            </div>
            @endif
        </div>
        <div class="offcanvas__nav__option">
            <a href="#"><img src="{{asset('user')}}/img/icon/cart.png" alt=""> <span>0</span></a></a>
            <div class="price">
                @if(Auth::guard('user')->check())
                    {{number_format($stoplam,2)}} &#8378;
                @else
                    0.00 &#8378;
                @endif
        </div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Tüm alışverişlerinizde kargo bedava!</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Tüm alışverişlerinizde kargo bedava!</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                @if(!Auth::guard('user')->check())
                            <a href="{{route('userlogin')}}">Giriş Yap</a>
                            <a href="{{route('useregister')}}">Kayıt Ol</a>
                            
                            @endif
                            </div>
                            @if(Auth::guard('user')->check())
                            <div class="header__top__hover">
                                <span>{{$usergenel->ad}} {{$usergenel->soyad}} <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li><a style="color:black" href="{{route('siparis')}}">Siparişlerim</a></li>
                                    <li><a style="color:black" href="{{route('uyeler.edit',$usergenel->no)}}">Ayarlar</a></li>
                                    <li><a style="color:black" href="{{route('userlogout')}}">Çıkış Yap</a></li>
                                   
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a style="font-size:25px;color:black;font-weight:bold" href="{{route('homepage')}}">Antiocheia Bujiteri</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="@if(Request::segment(1) == '') active @endif"><a href="{{route('homepage')}}">Anasayfa</a></li>
                            <li class="@if(Request::segment(1) == 'hakkimizda') active @endif"><a href="{{route('hakkimizda')}}">Hakkımızda</a></li>
                            <li class="@if(Request::segment(1) == 'iletisim') active @endif"><a href="{{route('iletisim')}}">İletişim</a></li>

                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="{{route('sepet')}}"><img src="{{asset('user')}}/img/icon/cart.png" alt=""> 
                        <span>@if(Auth::guard('user')->check()) {{$sepetsay}} @else 0 @endif</span></a>
                        <div class="price">
                        @if(Auth::guard('user')->check())
                        {{number_format($stoplam,2)}} &#8378;
                @else
                0.00 &#8378;
                @endif
                    </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->