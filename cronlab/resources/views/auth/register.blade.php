
@extends('layouts.app')
@section('title', 'Inscrivez-vous')
@section('content')

    <div class="container">
		<div class="card-content">
						<center><img src="\img\register.png"></center>
						</div>
        <div class="row">
            @if(session()->get( 'message' ))
					 <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="alert">
                        {{ session()->get( 'message' ) }}
                    </div>
					</div>
            @endif
       
       
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">

					
				
                     <!--<div class="social-line">
                            <a href="{{route('social.auth', ['provider'=>'facebook'])}}" class="btn btn-just-icon btn-simple"><img src="/img/facebook-connect.png"  />
                                    <i class=""></i>
                            </a>
                   
                        </div>
                    <p class="description text-center">ou version standard</p>-->
					 <br>
                    <div class="row">
                        <div class="card-content">

                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">

                            {{ csrf_field() }}

                            <div class="card-content">
                                <div class="input-group {{ $errors->has('name') ? ' has-error' : '' }}">
											<span class="input-group-addon">
												<i class="material-icons">face</i>
											</span>
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="name">Nom complet</label><input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                </div>
                                
                                <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
											<span class="input-group-addon">
												<i class="material-icons">email</i>
											</span>
                                    <div class="form-group label-floating">
                                    <label class="control-label" for="email">Adresse email</label><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                </div>

                                <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
											<span class="input-group-addon">
												<i class="material-icons">lock_outline</i>
											</span>
                                    <div class="form-group label-floating">
                                    <label class="control-label" for="password">Mot de Passe</label><input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">lock_outline</i>
											</span>
                                    <div class="form-group label-floating">
                                    <label class="control-label" for="password-confirm">Confirmer le mot de passe</label><input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                
                                
                                @if(\Request::has('ref'))
				 				<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">trending_up</i>
											</span>
                                    <div class="form-group label-floating">
                                    <label class="control-label" for="password-confirm">Link</label><input id="refer_link" type="text" class="form-control" name="refer_link" required>
                                    </div>
                                </div>
								
				@endif
                                
                                
                                

                                <!-- If you want to add a checkbox to this form, uncomment this code -->

                               <div class="checkbox">
                                <label>
                                <input type="checkbox" name="optionsCheckboxes" checked>
                                J'accepte les <a href="https://nosclick.com/termes-et-conditions" target=_blank>Termes et conditions</a>.
                                </label>
                                </div>
                            </div>
                            <div class="input-group col-md-4 col-md-offset-1">

                              {!! Recaptcha::render() !!} 

                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-info">
                                    <i class="material-icons">input</i> S'inscrire
                                </button>

                                <a class="btn btn-warning" href="{{ route('login') }}">
                                    <i class="material-icons">warning</i> Déjà un compte?
                                </a>
                            </div>
                        </form>
                    </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
