@extends('user.master')
@section('title','Sepetim')
@section('content')
  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Sepetim</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('homepage')}}">Anasayfa</a>
                            <span>Sepetim</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
             
                @if($sepetsay > 0)
               
                
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ürün</th>
                                    <th>Adet</th>
                                    <th>Toplam</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sepetgoster as $sepetim)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img width="50" height="50" src="{{asset('user')}}/img/product/{{$sepetim->getProduct->UrunResim}}" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$sepetim->getProduct->UrunlerAdi}}</h6>
                                            <h5>{{number_format($sepetim->getProduct->UrunFiyat, 2)}} &#8378;</h5>
                                        </div>
                                    </td>
                                    <form method="get" action="{{route('sepetsil')}}">
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="text" value="{{$sepetim->Adet}}" name="sadet">
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{$sepetim->UrunID}}" name="urunid" />
                                        <input type="hidden" value="{{Auth::guard('user')->id()}}" name="uyeid" />
                                    </td>
                                    <td class="cart__price">{{number_format($sepetim->getProduct->UrunFiyat * $sepetim->Adet,2)}} &#8378;</td>
                                    <td><button class="btn btn-danger"><i class="fa fa-close"></i></button></td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
               
               
                <div class="col-lg-4">
                   
                    <div class="cart__total">
                        <h6>Sepet Toplam</h6>
                        <ul>
                            <li>Ara toplam 
                                <span>
                                @if(Auth::guard('user')->check())
                    {{number_format($stoplam,2)}} &#8378;
                @else
                    0.00 &#8378;
                @endif
                            </span>
                        </li>
                            <li>Toplam <span>
                            @if(Auth::guard('user')->check())
                    {{number_format($stoplam,2)}} &#8378;
                @else
                    0.00 &#8378;
                @endif
                            </span></li>
                        </ul>
                        <a href="{{route('odeme')}}" class="primary-btn">Sepeti Onayla</a>
                    </div>
                </div>
                @else
                <table align="center">
                    <tr>
                        <td align="center"><i class="fa fa-shopping-cart" style="font-size: 100px;"></i></td>
                        </tr>
                    <tr>
                        <td style="font-size: 30px;">Sepetinizde ürün yok!</td>
                        </tr>
</table>
                @endif
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection