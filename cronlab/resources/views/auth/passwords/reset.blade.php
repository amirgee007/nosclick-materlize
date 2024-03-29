<html lang="en">
<head>
	<title>nosclick - Connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/img/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main1.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('password.request') }}">


					<span class="login100-form-title p-b-43">
						 <a href="https://nosclick.com"> <img src="/img/logo10.png" style="100%" alt=""/> </a>
					</span>

                    
                      {{ csrf_field() }}

                      <input type="hidden" name="token" value="{{ $token }}">
                    
                     @if ($errors->has('password'))
                                        <div class="wrap-input100">
                                        <div class="label-input100">
                                        <font color="red"><strong>{{ $errors->first('password') }}</strong></font>
                                        </div>
                                        </div>

                     @endif
                    
                     @if ($errors->has('email'))
                                        <div class="wrap-input100">
                                        <div class="label-input100">
                                        <font color="red"><strong>{{ $errors->first('email') }}</strong></font>
                                        </div>
                                        </div>
                     @endif

                    
                      @if ($errors->has('password_confirmation'))
                                        <div class="wrap-input100">
                                        <div class="label-input100">
                                        <font color="red"><strong>{{ $errors->first('password_confirmation') }}</strong></font>
                                        </div>
                                        </div>
                     @endif
                    
                    
                    
					
                    <div class="wrap-input100 validate-input {{ $errors->has('email') ? ' has-error' : '' }}" data-validate="Votre email est requis">
					<input id="email" type="email" class="input100" name="email" value="{{ $email or old('email') }}" required autofocus>
					<span class="focus-input100"></span>
					<span class="label-input100">Adresse email</span>
				   	</div>

					<div class="wrap-input100 validate-input {{ $errors->has('password') ? ' has-error' : '' }}" data-validate="Mot de passe requis">
					<input id="password" type="password" class="input100" name="password" required>
					<span class="focus-input100"></span>
					<span class="label-input100">Nouveau Mot de passe</span>
					</div>
                    
                    <div class="wrap-input100 validate-input {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
					<input id="password-confirm" type="password" class="input100" name="password_confirmation" required>
					<span class="focus-input100"></span>
					<span class="label-input100">Confirmation du mot de passe</span>
                    </div>

					<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
					Réinitialiser le mot de passe
					</button>
					</div>

                    <br><br><br>

                    <center>
                    <a href="https://nosclick.com/luxoritalia.pdf" target=_blank class="txt1">
                    Luxor Italia Srl - Via Giovanni Porzio 4 - Naples - Italie
                    </a>
                    </center>
					
					<!--<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							ou avec
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>-->
			    	</form>

				<div class="login100-more" style="background-image: url('/images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/bootstrap/js/popper.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/daterangepicker/moment.min.js"></script>
	<script src="/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/js/main1.js"></script>
        
</body>
</html>