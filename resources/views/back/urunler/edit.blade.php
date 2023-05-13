@extends('back.master')
@section('title',$urunler->UrunlerAdi." ürününü güncelle")
@section('content')
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                        </div>
                        <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                            <form method="post" action="{{route('urunler.update',$urunler->UrunlerID)}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                
                                <div class="form-group">
                                    <label>Ürün Başlığı</label>
                                    <input type="text" name="title" class="form-control"  value="{{$urunler->UrunlerAdi}}" />
                                </div>
                                
                                <div class="form-group">
                                    <label>Ürün Kategori</label>
                                    <select class="form-control" name="kategori">
                                        <option disabled selected>Seçim Yapınız</option>
                                        @foreach($categories as $category)
                                        <option @if($urunler->kat_id == $category->katID) selected @endif value="{{$category->katID}}">{{$category->katAdi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ürün Fotoğrafı</label><br>
                                    <img class="img-thumbnail rounded" src="{{asset($urunler->UrunResim)}}" width="200"  /><br><br>
                                    <input type="file" name="image" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Ürün İçeriği</label>
                                    <textarea id="summernote" name="content" class="form-control" rows="4">{!! $urunler->UrunAciklama !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Ürün Miktar</label>
                                    <input type="number" name="peace" class="form-control" value="{{$urunler->Miktar}}" />
                                </div>
                                <div class="form-group">
                                    <label>Ürün Fiyatı</label>
                                    <input type="number" name="price" class="form-control" value="{{$urunler->UrunFiyat}}" />
                                </div>
                                <div class="form-group">
                                    <label>Ürün Renk</label>
                                    <input type="color" name="color" class="form-control" value="{{$urunler->UrunRenk}}" />
                                </div>
                                <div class="form-group">
                                    <label>Ürün İndirim</label>
                                    <input type="number" name="discount" class="form-control" value="{{$urunler->indirim}}" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Ürünü Güncelle</button>
                                </div>
                            </form>

                        </div>
                    </div>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
  $('#summernote').summernote(
    {
        'height':300
    }
  );

});
    </script>
@endsection
