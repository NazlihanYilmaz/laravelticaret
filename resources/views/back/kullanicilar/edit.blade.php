@extends('back.master')
@section('title',$uyeler->ad." ".$uyeler->soyad. " üyeyi güncelle")
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
                            <form method="post" action="{{route('kullanicilar.update',$uyeler->no)}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                
                            <div class="form-group">
                                    <label>Ad</label>
                                    <input type="text" name="name" class="form-control" value="{{$uyeler->ad}}" />
                                </div>
                                <div class="form-group">
                                    <label>Soyad</label>
                                    <input type="text" name="surname" class="form-control" value="{{$uyeler->soyad}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Kullanıcı Adı</label>
                                    <input type="text" name="username" class="form-control" value="{{$uyeler->kullaniciadi}}" />
                                </div>
                               
                                
                                
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{$uyeler->email}}" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Üyeyi Güncelle</button>
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
