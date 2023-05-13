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