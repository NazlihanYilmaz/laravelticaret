@extends('back.master')
@section('title',"Kullanıcı Oluştur")
@section('content')
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('kullanicilar.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                    <label>Ad</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" />
                                    @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                                </div>
                                <div class="form-group">
                                    <label>Soyad</label>
                                    <input type="text" name="surname" class="form-control" value="{{old('surname')}}" />
                                    @if ($errors->has('surname'))
                                      <span class="text-danger">{{ $errors->first('surname') }}</span>
                                  @endif
                                </div>
                                <div class="form-group">
                                    <label>Kullanıcı Adı</label>
                                    <input type="text" name="username" class="form-control" value="{{old('username')}}" />
                                    @if ($errors->has('username'))
                                      <span class="text-danger">{{ $errors->first('username') }}</span>
                                  @endif
                                </div>
                                <div class="form-group">
                                    <label>Şifre</label>
                                    <input type="password" name="password" class="form-control" value="{{old('password')}}" />
                                    @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                                </div>
                                <div class="form-group">
                                    <label>Şifre Tekrar</label>
                                    <input type="password" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}" />
                                    @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
                                </div>
                                
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{old('email')}}" />
                                    @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                               
                               
                              
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Kullanıcı Oluştur</button>
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
