
@extends('layouts.app')
@section('title', 'Connexion au panneau de controle')
@section('content')
    <div class="container">
        
        
	<div class="card-content">
		<center><img src="\img\login.png"></center>
		</div>
		
		@if(session()->get( 'message' ))
					 <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="alert">
                        {{ session()->get( 'message' ) }}
                    </div>
					</div>
				
					
       @endif
		
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    
                    
					<form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                         <!--<div class="social-line">
                                <a href="{{route('social.auth', ['provider'=>'facebook'])}}" class="btn btn-just-icon btn-simple"><img src="/img/facebook-connect.png"  />
                                    <i class=""></i>
                                </a>

                            </div>
                        <p class="description text-center">ou version standard</p>-->

                        <br>
                        <div class="card-content">
                            <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="email">Adresse e-mail</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
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
                                    <label class="control-label" for="password">Mot de passe</label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                                </label>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-info">S'identifier</button>
                            <a class="btn btn-success" href="{{ route('password.request') }}">
                                Mot de passe oublié?
                            </a>
                        </div>
                    </form>
					<br>

                </div>
            </div>

@endsection

