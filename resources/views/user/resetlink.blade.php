@extends('user.master')
@section('title','Kullanıcı Şifre Sıfırlama Linki')
@section('content')
 <!-- Contact Section Begin -->
 <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <h2>Şifre Sıfırlama Linki</h2>
                            
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{$errors->first()}}


                        </div>
                        @endif
                        @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                        <form method="post" action="{{route('userreset.password.post')}}" >
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="email" id="email_address" name="email"  placeholder="Email" style="color:black">
                                    @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" id="password" name="password"  placeholder="Şifre" style="color:black">
                                    @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                                </div>
                                <div class="col-lg-12">
                                <input type="password"
                                                id="password-confirm" name="password_confirmation" placeholder="Şifre" style="color:black" required autofocus>
                                                @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="site-btn">Şifreyi Sıfırla</button>
                                    

                                </div>
                                <div class="col-lg-12">
                                   
                                    <a class="btn btn-danger mt-2" href="#">Giriş Yap</a>
                                    <a class="btn btn-primary mt-2" href="#">Kayıt Ol</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

   
@endsection


