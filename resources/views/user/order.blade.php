@extends('user.master')
@section('title','Siparişlerim')
@section('content')
  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Siparişlerim</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('homepage')}}">Anasayfa</a>
                            <span>Siparişlerim</span>
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
             
                @if($siparisay > 0)
               
                
                <div class="col-lg-12">
                    <div class="shopping__cart__table" style="width:100%;">
                        <table style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Ürün</th>
                                    <th>Birim Fiyat</th>
                                    <th>Adet</th>
                                    <th>Toplam</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="siparis-table">
                                @foreach($siparisgoster as $siparisim)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img width="50" height="50" src="{{asset('user')}}/img/product/{{$siparisim->getProduct->UrunResim}}" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$siparisim->getProduct->UrunlerAdi}}</h6>
                                            <h5>{{number_format($siparisim->getProduct->UrunFiyat, 2)}} &#8378;</h5>
                                        </div>
                                    </td>
                                    <form method="get" @if($siparisim->siparis_durum == 0) action="{{route('siparisil')}}" @elseif($siparisim->siparis_durum==5) action="{{route('siparisguncelle2',$siparisim->Siparis_no)}}" @else action="#" @endif >
                                    <td>{{number_format($siparisim->getProduct->UrunFiyat,2)}} &#8378;</td>
                                        <td>
                                       
                                           
                                               {{$siparisim->adet}} adet
                                            
                                        <input type="hidden" value="{{$siparisim->urun_id}}" name="urunid" />
                                        <input type="hidden" value="{{Auth::guard('user')->id()}}" name="uyeid" />
                                    </td>
                                    <td class="cart__price">{{number_format($siparisim->getProduct->UrunFiyat * $siparisim->adet,2)}} &#8378;</td>
                                   
                                    <td>
                                        @if($siparisim->siparis_durum == 0)
                                        <button class="btn btn-danger">İptal et</button>
                                        @elseif($siparisim->siparis_durum == 1)
                                        <button type="button" class="btn btn-success">Onaylandı</button>
                                        @elseif($siparisim->siparis_durum == 2)
                                        <button type="button" class="btn btn-warning">Tedarik ediliyor</button>
                                        @elseif($siparisim->siparis_durum == 3)
                                        <button type="button" class="btn btn-info">Kutulanıyor</button>
                                        @elseif($siparisim->siparis_durum == 4)
                                        <button type="button" class="btn btn-danger">Yola çıktı</button>
                                        @elseif($siparisim->siparis_durum == 5)
                                        <button class="btn btn-success">Teslim aldım</button>
                                        @elseif($siparisim->siparis_durum == 6)
                                        <i style="color:green" class="fa fa-check fa-2x"></i>
                                        @endif
                                    </td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
               
            
                @else
                <table align="center">
                    <tr>
                        <td align="center"><i class="fa fa-shopping-cart" style="font-size: 100px;"></i></td>
                        </tr>
                    <tr>
                        <td style="font-size: 30px;">Siparişiniz yok!</td>
                        </tr>
</table>
                @endif
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->


<script>  

document.addEventListener("DOMContentLoaded",function(){  
    
  
    // Jquery sayfa yüklediğinde çalışmaya başlayacak kod yapısı
    function veriCek()
    {
  $.ajax({   
            url: "siparisgoster",
            type: "GET",
           
            //form bilgilerini veri parametrelerine dönüştürecek kod
           success: function(e)
           {
           $("#siparis-table").html(e);
        
    }});
    
    }
    setInterval(veriCek,1000);
   
});

</script>


@endsection