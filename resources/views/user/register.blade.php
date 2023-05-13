@extends('user.master')
@section('title','Kullanıcı Kayıt')
@section('content')
 <!-- Contact Section Begin -->
 <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <h2>Kayıt Ol</h2>
                            
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}


                        </div>
                        @endforeach
                        @endif
                        @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                        <form action="{{route('registerpost')}}" method="POST">
                        @csrf
                            <div class="row">
                            <div class="col-lg-12">
                                    <input type="text" name="name" placeholder="Ad" style="color:black">
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="surname" placeholder="Soyad" style="color:black">
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="username" placeholder="Kullanıcı Adı" style="color:black">
                                </div>
                                <div class="col-lg-12">
                                    <input type="email" name="email" placeholder="Email" style="color:black">
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" name="password" placeholder="Şifre" style="color:black">
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="site-btn">Kayıt Ol</button>
                                    

                                </div>
                                <div class="col-lg-12">
                                   
                                <a class="btn btn-danger mt-2" href="{{route('userforget.password.get')}}">Şifre Sıfırlama</a>
                                    <a class="btn btn-primary mt-2" href="{{route('userlogin')}}">Giriş Yap</a>
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


