<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

            <div class="sidebar-brand-text">Antiocheia Bujiteri Yönetim Paneli</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item @if(Request::segment(2) == 'panel') active @endif">
            <a class="nav-link" href="{{route('admin')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Panel</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            İçerik Yönetimi
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item @if(Request::segment(2) == 'urunler') active @endif">
            <a class="nav-link @if(Request::segment(2) == 'urunler') in @else collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-shopping-cart"></i>
                <span>Ürünler</span>
            </a>
            <div id="collapseTwo" class="collapse @if(Request::segment(2) == 'urunler') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Ürün İşlemleri</h6>
                    <a class="collapse-item @if(Request::segment(2) == 'urunler' and !Request::segment(3)) active @endif" href="{{route('urunler.index')}}">Tüm Ürünler</a>
                    <a class="collapse-item @if(Request::segment(2) == 'urunler' and Request::segment(3) == 'create') active @endif" href="{{route('urunler.create')}}">Ürün Oluştur</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item @if(Request::segment(2) == 'kullanicilar') active @endif">
            <a class="nav-link @if(Request::segment(2) == 'kullanicilar') in @else collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseThree"
                aria-expanded="true" aria-controls="collapseThree">
                <i class="fas fa-user"></i>
                <span>Kullanıcılar</span>
            </a>
            <div id="collapseThree" class="collapse @if(Request::segment(2) == 'kullanicilar') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kullanıcı İşlemleri</h6>
                    <a class="collapse-item @if(Request::segment(2) == 'kullanicilar' and !Request::segment(3)) active @endif" href="{{route('kullanicilar.index')}}">Tüm Kullanıcılar</a>
                    <a class="collapse-item @if(Request::segment(2) == 'kullanicilar' and Request::segment(3) == 'create') active @endif" href="{{route('kullanicilar.create')}}">Kullanıcı Oluştur</a>
                </div>
            </div>
        </li>
        
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item @if(Request::segment(2) == 'siparisler') active @endif">
            <a class="nav-link @if(Request::segment(2) == 'siparisler') in @else collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseFour"
                aria-expanded="true" aria-controls="collapseFour">
                <i class="fas fa-user"></i>
                <span>Siparişler</span>
            </a>
            <div id="collapseFour" class="collapse @if(Request::segment(2) == 'siparisler') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Sipariş İşlemleri</h6>
                    <a class="collapse-item @if(Request::segment(2) == 'siparisler' and !Request::segment(3)) active @endif" href="{{route('siparisler.index')}}">Tüm Siparişler</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

     

        <!-- Nav Item - Pages Collapse Menu -->
       

      

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <!-- Sidebar Message -->
       
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>



                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$admingenel->adsoyad}} <i class="fas fa-caret-down"></i></span>

                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                           
                            <a class="dropdown-item" href="{{route('yonetim.edit',$admingenel->no)}}">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ayarlar
                            </a>
                          
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Çıkış Yap
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>

            <div class="container-fluid">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
    <a href="{{route('homepage')}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-globe fa-sm text-white-50"></i> Siteyi Görüntüle</a>
</div>
