@extends('layouts.admin')

@section('title', 'Créer un profil de membre')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Créer un profil de membre -
                        <small class="category">Compléter le profil du membre</small>
                    </h4>

                    <form action="{{route('admin.user.store')}}" method="post">
                        {{ csrf_field() }}
                        @if(count($errors) > 0)
                            <div class="alert alert-danger alert-with-icon" data-notify="container">
                                <i class="material-icons" data-notify="icon">notifications</i>
                                <span data-notify="message">

                                    @foreach($errors->all() as $error)
                                        <li><strong> {{$error}} </strong></li>
                                    @endforeach

                            </span>
                            </div>
                        @endif


                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group label-floating">
                                    <label  class="control-label" for="name">Nom complet</label>
                                    <input id="name" name="name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="email">Adresse email</label>
                                    <input id="email" name="email" type="text" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="password">Nouveau mot de passe</label>
                                    <input id="password" name="password" type="text" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="confirm-password">Confirmer le nouveau mot de passe</label>
                                    <input id="confirm-password" name="confirm-password" type="password" class="form-control">

                                </div>
                            </div>
                        </div>
                        <a href="{{route('admin.users.index')}}" class="btn btn-rose">Annuler</a>
                        <button type="submit" class="btn btn-success pull-right">Créer un profil</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
