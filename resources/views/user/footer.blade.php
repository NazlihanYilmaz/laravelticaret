<!-- Footer Section Begin -->
<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                        <a style="font-size:30px;color:white;font-weight:bold" href="{{route('homepage')}}">Antiocheia Bujiteri</a>

                        </div>
                        <p>Müşteri, tasarımı da içeren benzersiz iş modelimizin merkezinde yer alır.</p>
                        <a href="#"><img src="{{asset('user')}}/img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Alışveriş</h6>
                        <ul>
                            <li><a href="{{route('hakkimizda')}}">Hakkımızda</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Alışveriş</h6>
                        <ul>
                            <li><a href="{{route('iletisim')}}">İletişim</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>Haberler</h6>
                        <div class="footer__newslatter">
                            <p>Yeni gelenlerden, kataloglardan, indirimlerden ve promosyonlardan ilk siz haberdar olun!</p>
                            <form action="#">
                                <input type="text" placeholder="E-posta adresiniz">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            Tüm Hakları Saklıdır.</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{asset('user')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('user')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('user')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('user')}}/js/jquery.nicescroll.min.js"></script>
    <script src="{{asset('user')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('user')}}/js/jquery.countdown.min.js"></script>
    <script src="{{asset('user')}}/js/jquery.slicknav.js"></script>
    <script src="{{asset('user')}}/js/mixitup.min.js"></script>
    <script src="{{asset('user')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('user')}}/js/main.js"></script>
    
<!-- bootstrap javascripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

<!-- easycard plugin -->
<script type="text/javascript" src="{{asset('user')}}/js/easycard.min.js"></script>

<script type="text/javascript">
$('.cc-wrapper').easycard();
</script>
</body>

</html>