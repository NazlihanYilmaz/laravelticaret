@extends('back.master')
@section('title',"Tüm Üyeler")
@section('content')
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">@yield('title')
                           
                        </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" id="uyeler-table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Ad</th>
                                            <th>Soyad</th>
                                            <th>Kullanıcı Adı</th>
                                           
                                            <th>Email</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody id="uyeler">
                                        @foreach($uyeler as $uye)
                                        <tr>
                                            <td>{{$uye->ad}}</td>
                                            <td>{{$uye->soyad}}</td>
                                            <td>{{$uye->username}}</td>
                                            
                                            <td>{{$uye->email}}</td>
                                            <td>
                                            <input class="switch" uye-id="{{$uye->no}}" type="checkbox" data-on="Aktif" data-off="Pasif" @if($uye->durum == 1) checked @else @endif data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>
                                                <a target="_blank" href="#" title="Görüntüle" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('kullanicilar.edit',$uye->no)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                                                <a href="{{route('kullanicisilme',$uye->no)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>

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

    id = $(this)[0].getAttribute("uye-id");
    statu = $(this).prop("checked");
    $.get("{{route('switchKullanici')}}", {id:id,statu:statu}, function(data, status){
    console.log(data);
    });

    })
})
</script>
@endsection

