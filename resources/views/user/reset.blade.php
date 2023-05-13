@extends('user.master')
@section('title','Kullanıcı Şifre Sıfırlama')
@section('content')
 <!-- Contact Section Begin -->
 <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <h2>Şifre Sıfırlama</h2>
                            
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
                        <form action="{{route('userforget.password.post')}}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="email" name="email" id="email_address" placeholder="Email" style="color:black">
                                    @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                                </div>
                                
                                <div class="col-lg-12">
                                    <button type="submit" class="site-btn">Şifreyi Sıfırla</button>
                                    

                                </div>
                                <div class="col-lg-12">
                                   
                                <a class="btn btn-danger mt-2" href="{{route('userlogin')}}">Giriş Yap</a>
                                    <a class="btn btn-primary mt-2" href="{{route('useregister')}}">Kayıt Ol</a>
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


