@extends('user.master')
@section('title',"Hakkımızda")
@section('content')


 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Hakkımızda</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('homepage')}}">Anasayfa</a>
                            <span>Hakkımızda</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about__pic">
                        <img src="{{URL::asset('user')}}/img/about/t25_bijuteri-ne-demek-bijuter-694.webp" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="about__item">
                        <h4>Hakkımızda</h4>
                        <p>
                        <b>Antiocheia Bujiteri</b> mağazası, müşterilerimize kaliteli mücevher ve takılar sunan güvenilir bir mağazadır. Müşterilerimizin memnuniyeti ve güvenliği bizim önceliğimizdir. <br><br>

Mağazamızda, el yapımı mücevherlerden yüksek kaliteli pırlantalı kolyelere kadar geniş bir ürün yelpazesi bulabilirsiniz. Uzman tasarımcılarımız tarafından tasarlanan ve üretilen takılarımız, en kaliteli malzemelerden yapılmıştır ve yüksek standartlara uygun olarak üretilir. <br><br>

Müşterilerimize mümkün olan en iyi alışveriş deneyimini sağlamak için, deneyimli personelimiz sizlere yardımcı olmak için her zaman hazır ve nazırdır. Müşterilerimiz her zaman bir güler yüzle karşılanır ve mağazamızda rahat hissetmeleri için her şey yapılır.<br><br>

<b>Antiocheia Bujiteri</b>, aynı zamanda müşterilerimize uygun fiyatlar sunar. Mücevher ve takılarımızın kalitesi, fiyatımızın üzerinde olsa da, müşterilerimize her zaman adil bir fiyat sunmayı hedefliyoruz.<br><br>

Mağazamızda sizleri ağırlamaktan mutluluk duyarız ve ihtiyacınız olan her şeyi bulmanız için elimizden geleni yapacağız. <b>Antiocheia Bujiteri</b>, müşterilerimize kaliteli takılar sunan bir mağaza olarak varlığını sürdürmektedir ve bu ilkeyi mümkün olan en yüksek seviyede korumaya devam edecektir.
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- About Section End -->

@endsection


