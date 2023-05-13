@extends('back.master')
@section('title',"Tüm Ürünler")
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
                                        <th>Ürün Resmi</th>
                                            <th>Ürün Adı</th>
                                            <th>Ürün Fiyatı</th>
                                            <th>Ürün Açıklama</th>
                                            <th>Miktar</th>
                                            <th>Ürün Renk</th>
                                            <th>İndirim</th>
                                            <th>Kategori</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($urunler as $urun)
                                        <tr>
                                        <td><img width="60" src="{{URL::asset('user')}}/img/product/{{$urun->UrunResim}}" /></td>
                                            <td>{{$urun->UrunlerAdi}}</td>
                                           
                                            <td>{{$urun->UrunFiyat}}</td>
                                            <td>{!!Str::limit($urun->UrunAciklama,150)!!}</td>
                                            <td>{{$urun->Miktar}}</td>
                                            <td><i style="color:{{$urun->UrunRenk}};" class="fas fa-square fa-3x"></i></td>
                                            <td>{{$urun->indirim}}</td>
                                            <td>{{$urun->getCategory->katAdi}}</td>

                                            <td>
                                            <input class="switch" urun-id="{{$urun->UrunlerID}}" type="checkbox" data-on="Aktif" data-off="Pasif" @if($urun->durum == 1) checked @else @endif data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>
                                                <a target="_blank" href="#" title="Görüntüle" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('urunler.edit',$urun->UrunlerID)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                                                <a href="{{route('urunsilme',$urun->UrunlerID)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>

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
<script>
  $(function() {
    $('.switch').change(function() {

    id = $(this)[0].getAttribute("urun-id");
    statu = $(this).prop("checked");
    $.get("{{route('switch')}}", {id:id,statu:statu}, function(data, status){
    console.log(data);
    });

    })
})
</script>
@endsection

