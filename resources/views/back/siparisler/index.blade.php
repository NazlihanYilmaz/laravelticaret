@extends('back.master')
@section('title',"Tüm Siparişler")
@section('content')
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">@yield('title')
                           
                        </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Resim</th>
                                        <th>Ürün Adı</th>
                                        <th>Ad Soyad</th>
                                        <th>Birim Fiyat</th>
                                        <th>Adet</th>
                                        <th>Toplam</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($siparisler as $siparis)
                                        <tr>
                                            <td><img width="50" height="50" src="{{asset('user')}}/img/product/{{$siparis->getProduct->UrunResim}}" alt=""></td>
                                            <td>{{$siparis->getProduct->UrunlerAdi}}</td>
                                            <td>{{$siparis->getUser->ad}} {{$siparis->getUser->soyad}}</td>
                                            <td>{{$siparis->getProduct->UrunFiyat}} &#8378;</td>
                                            <td>{{$siparis->adet}} adet</td>
                                            <td>{{$siparis->toplam}} &#8378;</td>
                                           <td>
                                            @if($siparis->siparis_durum == 0)
                                            <a href="{{route('siparisguncelle',$siparis->Siparis_no)}}" class="btn btn-primary">Onayla</a>
                                            @endif
                                            @if($siparis->siparis_durum == 1)
                                            <a href="{{route('siparisguncelle',$siparis->Siparis_no)}}" class="btn btn-info">Tedarik Et</a>
                                            @endif
                                            @if($siparis->siparis_durum == 2)
                                            <a href="{{route('siparisguncelle',$siparis->Siparis_no)}}" class="btn btn-warning">Kutula</a>
                                            @endif
                                            @if($siparis->siparis_durum == 3)
                                            <a href="{{route('siparisguncelle',$siparis->Siparis_no)}}" class="btn btn-danger">Kargoya Ver</a>
                                            @endif
                                            @if($siparis->siparis_durum == 4)
                                            <a href="{{route('siparisguncelle',$siparis->Siparis_no)}}" class="btn btn-warning">Teslim Et</a>
                                            @endif
                                            @if($siparis->siparis_durum == 5)
                                            <button class="btn btn-sm btn-success">K. onayı bekliyor</button>
                                            @endif
                                            @if($siparis->siparis_durum == 6)
                                            <button class="btn btn-success">Teslim Edildi</button>
                                            @endif
                                        </td>
                                           <td>
                                                <a href="{{route('siparisil',$siparis->Siparis_no)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>

                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection


@section('css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection


