@extends('user.master')
@section('title',"Ödeme Ekranı")
@section('content')

<link rel="stylesheet" href="{{asset('user')}}/css/easycard.min.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- form customized style -->
	<style type="text/css">
	.card-header-custom{
		background: linear-gradient(135deg, rgba(191,13,48,1) 0%, rgba(255,84,121,1) 38%, rgba(191,13,48,1) 100%);
		color: #fff;
		font-weight: bold;
	}
	.btn-custom{
		background: linear-gradient(135deg, rgba(8,75,94,1) 0%, rgba(20,108,140,1) 34%, rgba(3,47,59,1) 96%, rgba(3,47,59,1) 100%);
		width: 100%;
		color: #fff;
		cursor: pointer;
	}
	</style>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Ödeme</h4>
                    <div class="breadcrumb__links">
                        <a href="{{route('homepage')}}">Anasayfa</a>
                        <span>Ödeme</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<div class="col-md-8 mx-auto mt-5">
                                @if ($errors->has('adsoyad'))
                                      <div class="alert alert-danger">
                                        
                                        {{ $errors->first('adsoyad') }}
                                    </div>
                                @endif
                                @if ($errors->has('card-number'))
                                      <div class="alert alert-danger">
                                        
                                        {{ $errors->first('card-number') }}
                                    </div>
                                @endif
                                @if ($errors->has('month'))
                                      <div class="alert alert-danger">
                                        
                                        {{ $errors->first('month') }}
                                    </div>
                                @endif
                                @if ($errors->has('year'))
                                      <div class="alert alert-danger">
                                        
                                        {{ $errors->first('year') }}
                                    </div>
                                @endif
                                @if ($errors->has('cvv'))
                                      <div class="alert alert-danger">
                                        
                                        {{ $errors->first('cvv') }}
                                    </div>
                                @endif
<form action="{{route('sepetonayla')}}">
                        @csrf
	<div class="row">
        
		<div class="col-md-6">
            
			<div class="card">
				<div class="card-header card-header-custom">Kredi Kartı Bilgileriniz</div>
				<div class="panel-block">
					<div class="col-md-12">
						<div class="form-group">
							<label>Ad Soyad</label>
							<input type="text" class="form-control" name="adsoyad" id="name">
                           
						</div>
                       
						<div class="form-group">
							<label>Kredi Kartı Numarası</label>
							<div class="input-group">
								<input type="text" class="form-control" name="card-number" id="number">
								<div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                               
							</div>
                           
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-8">
									<label>Son Kullanma Tarihi</label>
									<div class="input-group">
										<select class="form-control" name="month" id="date-m">
											<option disabled>Ay</option>
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
										</select>
                                      
										<select class="form-control" name="year" id="date-y">
											<option disabled>Yıl</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
                                            <option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
                                            <option value="30">30</option>
											<option value="31">31</option>
											<option value="32">32</option>
											<option value="33">33</option>
											<option value="34">34</option>
										</select>
                                        
									</div>
                                   
								</div>
								<div class="col-md-4">
									<label>CVC</label>
									<input type="text" class="form-control" name="cvv" id="cvc" maxlength="4">
                                    
                                </div>
                              
							</div>
						</div>
						<div class="form-group">
						<button class="btn btn-custom">ÖDE</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="cc-wrapper"></div>
            <br>
            <h5><span>Garantili Güvenli Ödeme</span></h5>
                                <img src="{{asset('user')}}/img/shop-details/details-payment.png" alt="">
		</div>
	</div>


</form>

</div>


<br><br>
    
<!-- bootstrap javascripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

<!-- easycard plugin -->
<script type="text/javascript" src="{{asset('user')}}/js/easycard.min.js"></script>

<script type="text/javascript">
$('.cc-wrapper').easycard();
</script>
@endsection