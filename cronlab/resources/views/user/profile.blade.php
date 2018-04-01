@extends('layouts.dashboard')

@section('title', 'Profil')

@section('content')


    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Mon profil -
                        <small class="category">Modifier votre profil</small>
                    </h4>

                    <form action="{{route('userProfile.update')}}" method="post" enctype="multipart/form-data">
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
                            <div class="col-md-6 col-md-offset-3">
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
                                    <label  class="control-label" for="first_name">Nom</label>
                                    <input id="first_name" name="first_name" type="text" value="{{$user->first_name}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="last_name">Prénom</label>
                                    <input id="last_name" name="last_name" value="{{$user->last_name}}" type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="email">Adresse email</label>
                                    <input id="email" name="email" value="{{$user->email}}" type="text" class="form-control" readonly>
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
                                    <label  class="control-label" for="mobile">Téléphone mobile</label>
                                    <input id="mobile" name="mobile" type="text" value="{{$user->profile->mobile}}" class="form-control">
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
                        <a href="{{route('userDashboard')}}" class="btn btn-rose">Annuler</a>
                        <button type="submit" class="btn btn-success pull-right">Mettre à jour</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    

            <div class="col-md-4">
                <div class="card card-content">
                   <!-- <div class="card-content">
                        <div class="alert alert-info">
                            <h4 class="card-title text-center"><span>Vérification KYC & AML </span></h4>
                        </div>-->
                        <br>
                        @if(count($identity) == 0 and count($address) == 0)
                      <center> <span class="control-label"><img src="/img/id_verification.gif" /> Vérification d'identité   </span></center><center> <span class="btn btn-info btn-sm">Pas encore envoyé</span></center>
                        <br>
                      <center><span class="control-label"><img src="/img/address_verification.gif" /> Vérification d'adresse  </span></center><center><span class="btn btn-info btn-sm">Pas encore envoyé</span></center>
                        <br>
                        <a href="{{route('userKyc')}}" class="btn btn-success center-block">Soumettre la vérification</a>

									@else
									<center> <span class="control-label"><img src="/img/id_verification.gif" />  Vérification d'identité </span></center>
                                    @if($result1)
                                        @if($result1->status == false)
                                       <center> <span class="btn btn-warning btn-sm">En cours de vérification</span></center>
                                        @else
                                        <center><span class="btn btn-success btn-sm">Approuvé</span></center>
                                        @endif
                                    @else
									<center> <span class="btn btn-info btn-sm">Pas encore envoyé</span></center>
                                    @endif
                         
                            <br>
                          <center> <span class="control-label"><img src="/img/address_verification.gif" />  Vérification d'adresse   </span></center>

                                @if($result2)
                                    @if($result2->status == false)
                                     <center>   <span class="btn btn-warning btn-sm">En cours de vérification</span></center>
                                    @else
                                      <center>  <span class="btn btn-success btn-sm">Approuvé</span></center>
                                    @endif
                                @else
                                  <center>  <span class="btn btn-info btn-sm">Pas encore envoyé</span></center>
                                @endif
                           
                            <br>

                            @if(count($identity) == 0 or count($address) == 0)

                                <a href="{{route('userKyc')}}" class="btn btn-success ">Soumettre la vérification</a>

                            @elseif(count($identity) == 1 and count($address) == 1)


                            @endif


                    @endif
                    </div>

                </div>
           


    



    </div>

@endsection
