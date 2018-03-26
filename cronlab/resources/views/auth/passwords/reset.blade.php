
@extends('layouts.app')
@section('title', 'Réinitialiser votre mot de passe')
@section('content')

    <div class="container">
	<div class="card-content">
						<center><img src="\img\reset.png"></center>
						</div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                           
                       <!-- <p class="description text-center">ou version standard</p>
                        <div class="card-content">
                             <div class="social-line">
                                  <a href="{{route('social.auth', ['provider'=>'facebook'])}}" class="btn btn-just-icon btn-simple"><img src="/img/facebook-connect.png"  />
                                    <i class=""></i>
                                </a>
                                                          </div>-->
													
							<br><br>
                            <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="email">Adresse email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
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

                            <div class="input-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="password-confirm">Confirmez le mot de passe</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>


                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
								</div>
                            </div>
                            


                        <div class="footer text-center">
                            <button type="submit" class="btn btn-info">Réinitialiser le mot de passe</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
