@extends('back.master')
@section('title',"Ürün Oluştur")
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
                            <form method="post" action="{{route('urunler.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                    <label>Ürün Başlığı</label>
                                    <input type="text" name="title" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Ürün Kategori</label>
                                    <select class="form-control" name="kategori">
                                        <option disabled selected>Seçim Yapınız</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->katID}}">{{$category->katAdi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ürün Fotoğrafı</label>
                                    <input type="file" name="image" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Ürün İçeriği</label>
                                    <textarea id="summernote" name="content" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Ürün Miktar</label>
                                    <input type="number" name="peace" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Ürün Fiyatı</label>
                                    <input type="number" name="price" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Ürün Renk</label>
                                    <input type="color" name="color" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Ürün İndirim</label>
                                    <input type="number" name="discount" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Ürünü Oluştur</button>
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
