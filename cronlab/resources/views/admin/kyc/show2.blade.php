@extends('layouts.admin')

@section('title', 'Afficher les données de formulaire de vérification')

@section('content')


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Afficher le profil du membre -
                        <small class="category">Avec les données de formulaire de vérification</small>
                    </h4>

                    <form>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset($verify->user->profile->avatar)}}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group label-floating">

                                    <label  class="control-label" for="name">Nom complet</label>
                                    <input id="name" name="name" type="text" value="{{$verify->user->name}}" disabled class="form-control">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="email">Adresse email</label>
                                    <input id="email" name="email" value="{{$verify->user->email}}" type="text" disabled class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group label-floating">
                                    <label  class="control-label" for="occupation">Fonction</label>
                                    <input id="occupation" name="occupation" type="text" value="{{$verify->user->profile->occupation}}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="mobile">Téléphone mobile</label>
                                    <input id="mobile" name="mobile" type="text" value="{{$verify->user->profile->mobile}}" disabled class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="address">Addresse Ligne 1</label>
                                    <input id="address" name="address" value="{{$verify->user->profile->address}}"  type="text" disabled class="form-control">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="address2">Addresse Ligne 2</label>
                                    <input id="address2" name="address2" value="{{$verify->user->profile->address2}}" type="text" disabled class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="city">Ville</label>
                                    <input id="city" name="city" type="text" value="{{$verify->user->profile->city}}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="state">Etat</label>
                                    <input id="state" name="state" type="text" value="{{$verify->user->profile->state}}" disabled class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="postcode">Code postal</label>
                                    <input id="postcode" name="postcode" type="text" value="{{$verify->user->profile->postcode}}" disabled class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="country">Pays</label>
                                    <input id="country" name="country" type="text" value="{{$verify->user->profile->country}}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="facebookurl">URL du profil Facebook</label>
                                    <input id="facebookurl" name="facebook" type="text" value="{{$verify->user->profile->facebook}}" disabled class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label  class="control-label" for="about">A propos</label>
                                        <input id="about" name="about" type="text" value="{{$verify->user->profile->about}}" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('adminKyc2Reject',['id'=>$verify->id])}}" class="btn btn-danger">Demande refusé</a>
                        <a href="{{route('adminKyc2Accept',['id'=>$verify->id])}}" class="btn btn-success pull-right">Demande approuvé</a>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="card card-content">
                    <div class="card-content">
                        <div class="alert alert-primary">
                            <h4 class="card-title text-center"><span>Données d'adresse</span></h4>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label  class="control-label" for="country">Type de document</label>
                                <input type="text" value="{{$verify->name}}" disabled class="form-control">
                            </div>
                        </div>
                        <br>
                        <h5 class="text-center text-info"> Image recto</h5>

                        <br>


                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="fileinput fileinput-new text-center">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{$verify->photo}}" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>


                    </div>

                </div>
            </div>


        </div>
    </div>

@endsection