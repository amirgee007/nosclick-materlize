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
                                    <label class="control-label" for="name">Customer Id</label>
                                    <a href="{{route('admin.user.edit' ,$verify->user->id)}}" target="_blank"><input id="name" title="Click to see the User" type="text" value="{{$verify->user->id}}"
                                                           class="form-control"> </a>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="name">Nom complet</label>
                                    <input id="name" name="name" type="text" value="{{$verify->user->name}}" disabled
                                           class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="email">Adresse email</label>
                                    <input id="email" name="email" value="{{$verify->user->email}}" type="text" disabled
                                           class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group label-floating">
                                    <label class="control-label" for="occupation">Fonction</label>
                                    <input id="occupation" name="occupation" type="text"
                                           value="{{$verify->user->profile->occupation}}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="mobile">Téléphone mobile</label>
                                    <input id="mobile" name="mobile" type="text"
                                           value="{{$verify->user->profile->mobile}}" disabled class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="address">Addresse Ligne 1</label>
                                    <input id="address" name="address" value="{{$verify->user->profile->address}}"
                                           type="text" disabled class="form-control">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="address2">Addresse Ligne 2</label>
                                    <input id="address2" name="address2" value="{{$verify->user->profile->address2}}"
                                           type="text" disabled class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="city">Ville</label>
                                    <input id="city" name="city" type="text" value="{{$verify->user->profile->city}}"
                                           disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="state">Etat</label>
                                    <input id="state" name="state" type="text" value="{{$verify->user->profile->state}}"
                                           disabled class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="postcode">Code postal</label>
                                    <input id="postcode" name="postcode" type="text"
                                           value="{{$verify->user->profile->postcode}}" disabled class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="country">Pays</label>
                                    <input id="country" name="country" type="text"
                                           value="{{$verify->user->profile->country}}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="facebookurl">URL du profil Facebook</label>
                                    <input id="facebookurl" name="facebook" type="text"
                                           value="{{$verify->user->profile->facebook}}" disabled class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="about">A propos</label>
                                        <input id="about" name="about" type="text"
                                               value="{{$verify->user->profile->about}}" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="about">Sponsor</label>
                                        <input id="about" name="about" type="text"
                                               value="{{$sponsor ? $sponsor->name : 'without godfather'}}" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('adminKycReject',['id'=>$verify->id])}}" class="btn btn-danger">Demande
                            refusé</a>
                        <a href="{{route('adminKycAccept',['id'=>$verify->id])}}" class="btn btn-success pull-right">Demande
                            approuvé</a>
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
                            <h4 class="card-title text-center"><span>Données d'identité</span></h4>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label" for="country">Type de document</label>
                                <input type="text" value="{{$verify->name}}" disabled class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label" for="country">Numéro du document</label>
                                <input type="text" value="{{$verify->number}}" disabled class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label" for="country">Date de naissance</label>
                                <input type="text" value="{{$verify->dob}}" disabled class="form-control">
                            </div>
                        </div>
                        <br>
                        <h5 class="text-center text-info"> Image recto</h5>

                        <br>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="fileinput fileinput-new text-center">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{$verify->front}}" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h5 class="text-center text-info"> Image verso</h5>

                        <br>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="fileinput fileinput-new text-center">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{$verify->back}}" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <h5 class="text-center text-info"> Account : {{$verify->status==1 ? 'Validate' : 'Not Validate'}}</h5>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">get_app</i>
                </div>
                <br>
                <h4 class="card-title">Historique des retraits</h4>
                <div class="card-content">
                    <br>
                    @if(count($withdraws) > 0)
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">Nª</th>
                                    <th class="text-center">ID de transaction</th>
                                    <th class="text-center">Processeur</th>
                                    <th class="text-center">Compte</th>
                                    <th class="text-center">Montant</th>
                                    <th class="text-center">Frais</th>
                                    <th class="text-center">Montant net</th>
                                    <th class="text-center">Mise à jour</th>
                                    <th class="text-center">Statut</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($withdraws as $withdraw)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$withdraw->transaction_id}}</td>
                                        <td class="text-center">{{$withdraw->gateway_name}}</td>
                                        <td class="text-center">{{$withdraw->account}}</td>
                                        <td class="text-center">€ {{$withdraw->amount +0}}</td>
                                        <td class="text-center">€ {{$withdraw->charge+0}}</td>
                                        <td class="text-center">€ {{$withdraw->net_amount+0}}</td>
                                        @if($withdraw->status == 1)
                                            <td class="text-center">{{$withdraw->updated_at->diffForHumans()}}</td>
                                        @else
                                            <td class="text-center">{{$withdraw->created_at->diffForHumans()}}</td>
                                        @endif
                                        <td >

                                            @if($withdraw->status == 1)
                                                <button class="btn btn-success">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>
                                                    Terminé
                                                </button>
                                            @else

                                                <button class="btn btn-info">
                                        <span class="btn-label">
                                            <i class="material-icons">autorenew</i>
                                        </span>
                                                    En traitement
                                                </button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    @else

                        <h1 class="text-center">Aucun retrait</h1>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$withdraws->render()}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">supervisor_account</i>
                    </div>
                    <br>
                    <h4 class="card-title">Mes parrainages</h4>
                    <div class="card-content">
                        <br>
                    <div class="table-responsive">
                        <br>
                        <div class="col-md-12">

                            <br><br>
                            @if(count($referrals) > 0)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">SN</th>
                                        <th class="text-center">Photo</th>
                                        <th class="text-center">Nom</th>
                                        <th class="text-center">Abonnement</th>
                                        <th class="text-center">Statut</th>
                                        <th class="text-center">Inscription</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @php $id=0;@endphp
                                    @foreach($referrals as $referral)
                                        @php $id++;@endphp
                                        <tr>
                                            <td class="text-center">{{ $id }}</td>
                                            <td class="text-center" width="10%" >
                                                <img src="{{$referral->user->profile->avatar}}" class="img-circle" alt="No Photo"  >
                                            </td>
                                            <td class="text-center">{{$referral->user->name}}</td>
                                            <td class="text-center">{{$referral->user->membership->name}}</td>
                                            <td class="text-center">Actif</td>
                                            <td class="text-center">{{$referral->user->created_at->diffForHumans()}}</td>
                                        </tr>

                                    @endforeach


                                    </tbody>
                                </table>

                            @else
                                <center> <h1> Il n'y a aucun parrainage.</h1></center>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-4">
                {{$referrals->render()}}
            </div>
        </div>
    </div>


@endsection