@extends('user.master')
@section('title','Bilgilerini Düzenle')
@section('content')
 <!-- Contact Section Begin -->
 <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <h2>Profil Düzenle</h2>
                            
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
                        <form action="{{route('uyeler.update',$userr->no)}}" method="POST">
                        @method('PUT')
                            @csrf
                            <div class="row">
                            <div class="col-lg-12">
                                    <input type="text" name="name" placeholder="Ad" value="{{$userr->ad}}" style="color:black">
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="surname" placeholder="Soyad" value="{{$userr->soyad}}" style="color:black">
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="username" placeholder="Kullanıcı Adı" value="{{$userr->username}}" style="color:black">
                                </div>
                                <div class="col-lg-12">
                                    <input type="email" name="email" placeholder="Email" value="{{$userr->email}}" style="color:black">
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="site-btn">Güncelle</button>
                                    

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


