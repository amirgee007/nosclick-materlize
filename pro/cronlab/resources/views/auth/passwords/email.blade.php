
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
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                     
                        <div class="card-content">
                            <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="email">Adresse e-mail</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-info">Envoyer le lien de réinitialisation</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection