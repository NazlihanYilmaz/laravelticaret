@extends('user.master')
@section('title',"İletişim")
@section('content')


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>İletişim</h4>
                    <div class="breadcrumb__links">
                        <a href="{{route('homepage')}}">Anasayfa</a>
                        <span>İletişim</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- API Map Begin -->
<div id="map" style="height:100%"></div>

<script>
    function initMap() {

        var options = {
            center: { lat: 36.199697949135974, lng: 36.16063302652165 },
            zoom: 15,
        };

        var image =
        "https://developers.google.com/maps/documentation/javascript/examples/full/images/library_maps.png";

        var map = new google.maps.Map(document.getElementById("map"), options);
        var markers = [
            { 
               coordinates:{ lat: 36.199697949135974, lng: 36.16063302652165 },
               content:"<h6>Antakya Saray Caddesi</h6>",
            }
        ];
        for(var i=0;i<markers.length;i++){
            AddMarker(markers[i]);
        }
       



        function AddMarker(options) {
            var marker = new google.maps.Marker({
                position: options.coordinates,
                map: map,
            });

            if(options.image){
                marker.setIcon(options.image);
            }

           if(options.content){
            var infoWindow = new google.maps.InfoWindow({
                content: options.content
            });

            marker.addListener("click", function () {
                infoWindow.open(map, marker);
            });

           }
        }

    }

</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9U-LL0fU3Q25izO7kBd1zrsdROOJ80TY&callback=initMap">
</script>
<!-- API Map End -->


<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__text">
                    <div class="section-title">
                        <h2>Bize Ulaş</h2>
                        <p>Mağazamızda bulunan her ürünümüz, sizin gibi değerli müşterilerimizin ilgi ve beğenisini
                            kazanmak için özenle seçilmiştir. Sizlere daha iyi hizmet verebilmek için, sorularınızı
                            cevaplamak ve yardımcı olmak için her zaman hazırız. Bize ulaşmak için, mağazamızın iletişim
                            bilgilerini aşağıda bulabilirsiniz.</p>
                    </div>
                    <ul>
                        <li>
                            <h4>Antakya</h4>
                            <p>Akasya Mahallesi<br />+90 531 123 12 12</p>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form">
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="İsim">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="E-posta">
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Mesaj"></textarea>
                                <button type="submit" class="site-btn">Mesajı Gönder</button>
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