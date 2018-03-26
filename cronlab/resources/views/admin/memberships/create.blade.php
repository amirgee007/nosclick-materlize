@extends('layouts.admin')

@section('title', 'Créer un nouvel abonnement')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Abonnement -
                        <small class="category">Créer un nouvel abonnement</small>
                    </h4>
                    <form action="{{route('admin.membership.store')}}" method="post">

                        {{csrf_field()}}

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
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label  class="control-label" for="name">Nom de l'abonnement</label>
                                <input id="name" name="name" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label  class="control-label" for="duration">Durée de l'abonnement</label>
                                <input id="duration" name="duration" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="price">Prix de l'abonnement</label>
                                    <input id="price" name="price" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="ad_limit">Limite d'annonces quotidienne</label>
                                    <input id="ad_limit" name="ad_limit" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label  class="control-label" for="details">Détails de l'abonnement</label>
                                <textarea class="form-control" name="details" id="details" rows="10"></textarea>

                            </div>
                        </div>
                    </div>

                    <br>


                    <a href="{{route('admin.memberships.index')}}" class="btn btn-rose">Annuler</a>

                        <button type="submit" class="btn btn-success pull-right">Créer un abonnement</button>

                    <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection