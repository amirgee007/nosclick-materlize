@extends('layouts.admin')

@section('title', 'Modifier le profil du membre')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Modifier le profil -
                        <small class="category">Information sur l'utilisateur</small>
                    </h4>

                    <form action="{{route('admin.user.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
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
                    <div class="col-md-4 col-md-offset-2">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                <img src="{{asset($user->profile->avatar)}}" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Sélectionner une image</span>
                                                        <span class="fileinput-exists">Changer</span>
                                                        <input type="file" name="avatar" />
                                                    </span>
                                <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Effacer</a>
                            </div>
                        </div>
                    </div>
                    </div>

                        

                    <div class="row">

                            <div class="col-md-6">

                                <div class="form-group label-floating">

                                    <label  class="control-label" for="name">Nom complet</label>
                                    <input id="name" name="name" type="text" value="{{$user->name}}" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="email">Adresse email</label>
                                    <input id="email" name="email" value="{{$user->email}}" type="text" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group label-floating">
                                    <label  class="control-label" for="occupation">Fonction</label>
                                    <input id="occupation" name="occupation" type="text" value="{{$user->profile->occupation}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="mobile">Numéro de portable</label>
                                    <input id="mobile" name="mobile" type="text" value="{{$user->profile->mobile}}" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="main_balance">Solde du compte</label>
                                    <input id="main_balance" name="main_balance" value="{{$user->profile->main_balance}}" type="number" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="deposit_balance">Compte dépôt</label>
                                    <input id="deposit_balance" name="deposit_balance" value="{{$user->profile->deposit_balance}}"  type="number" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="referral_balance">Compte parrainage</label>
                                    <input id="referral_balance" name="referral_balance" value="{{$user->profile->referral_balance}}"  type="number" class="form-control">

                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="address">Addresse Ligne 1</label>
                                    <input id="address" name="address" value="{{$user->profile->address}}"  type="text" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="address2">Addresse Ligne 2</label>
                                    <input id="address2" name="address2" value="{{$user->profile->address2}}" type="text" class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="city">Ville</label>
                                    <input id="city" name="city" type="text" value="{{$user->profile->city}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="state">Etat</label>
                                    <input id="state" name="state" type="text" value="{{$user->profile->state}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="postcode">Code postal</label>
                                    <input id="postcode" name="postcode" type="text" value="{{$user->profile->postcode}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="country">Pays</label>
                                    <input id="country" name="country" type="text" value="{{$user->profile->country}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="facebookurl">URL du profil Facebook</label>
                                    <input id="facebookurl" name="facebook" type="text" value="{{$user->profile->facebook}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label  class="control-label" for="about">A propos</label>
                                        <input id="about" name="about" type="text" value="{{$user->profile->about}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
						
							<div class="row">
                            <div class="col-md-3 ">
                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="admin" data-style="btn btn-warning btn-round" title="Single Select" data-size="7">
                                        <option value="0"
                                                @if($user->admin == 0)
                                                selected
                                                @endif
                                        > Utilisateur</option>
                                        <option value="1"
                                                @if($user->admin == 1)
                                                selected
                                                @endif

                                        > Administrateur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="active" data-style="btn btn-warning btn-round" title="Single Select" data-size="7">
                                        <option value="0"
                                                @if($user->active == 0)
                                                selected
                                                @endif
                                        > Inactif</option>
                                        <option value="1"
                                                @if($user->active == 1)
                                                selected
                                                @endif

                                        > Actif</option>
                                    </select>
                                </div>

                            </div>
                        </div>
						<button type="submit" class="btn btn-success pull-right">Valider</button>
                    <a href="{{route('admin.users.index')}}" class="btn btn-rose pull-right">Annuler</a>
                        
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

		
		
	
    </div>

@endsection
