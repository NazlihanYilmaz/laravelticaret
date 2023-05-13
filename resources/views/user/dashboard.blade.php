@extends('user.master')
@section('title','Anasayfa')
@section('content')


    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="{{asset('user')}}/img/hero/theme_banner_image_single.webp">
                
            </div>
            <div class="hero__items set-bg" data-setbg="{{asset('user')}}/img/hero/94-1679760574.jpeg">

            </div>
        </div>
    </section>
    <!-- Hero Section End -->

     <!-- Product Section Begin -->
     <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <h2 class="text-center m-5">Ürünler</h2>
                </div>
            </div>
            <div class="row product__filter">
                @foreach($urunler as $urun)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="{{asset('user')}}/img/product/{{$urun->UrunResim}}">
                            <span class="label">Yeni</span>
                            <ul class="product__hover">
                                <li><a href="{{route('urundetay',$urun->UrunlerID)}}"><img src="{{asset('user')}}/img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                        @if($urun->Miktar <= 5)
                            <h6 style="background-color:red;color:white;font-weight:bold;border-radius:4px;padding:0.4em;">Son {{$urun->Miktar}} Ürün</h6>
                            @endif
                            <h6>{{$urun->UrunlerAdi}}</h6>     
                            @if(Auth::guard('user')->check())
                            <a href="{{route('sepetekle2',['urunid'=>$urun->UrunlerID,'uyeid'=>Auth::guard('user')->id()])}}" class="add-cart">+ Sepete Ekle</a>
                            @else
                            <a href="{{route('sepetekle')}}" class="add-cart">+ Sepete Ekle</a>
                            @endif
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>{{number_format($urun->UrunFiyat,2)}} &#8378;</h5>
                            
                        </div>
                    </div>
                </div>             
                @endforeach
              
               
               
                
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection


