@extends('layouts.admin')

@section('title', 'Mettre à jour les paramètres')

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-tabs" data-background-color="purple">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">Paramètres de NOSCLICK:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#general" data-toggle="tab">
                                        <i class="material-icons">bug_report</i> Général
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#features" data-toggle="tab">
                                        <i class="material-icons">code</i> Caractéristiques
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#settings" data-toggle="tab">
                                        <i class="material-icons">cloud</i> Utilisateur
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="tab-content">
                        <div class="tab-pane active" id="general">

                            <form action="{{route('generalSettings',['id'=>$settings->id])}}" method="post">
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

                                    <div class="col-md-6">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="site_name">Nom du site</label>
                                            <input id="site_name" name="site_name" type="text" value="{{$settings->site_name}}" class="form-control">

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="site_title">Titre du site</label>
                                            <input id="site_title" name="site_title" type="text" value="{{$settings->site_title}}" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label  class="control-label" for="company_name">Nom de la société </label>
                                            <input id="company_name" name="company_name" type="text" value="{{$settings->company_name}}" class="form-control">

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label  class="control-label" for="contact_email">Adresse e-mail de contact</label>
                                            <input id="contact_email" name="contact_email" value="{{$settings->contact_email}}" type="text" class="form-control">

                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="app_contact">System Contact Email</label>
                                            <input id="app_contact" name="app_contact" type="text" value="{{$settings->app_contact}}" class="form-control">

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="disqus">Système Disqus (Nom d'utilisateur)</label>
                                            <input id="disqus" name="disqus" type="text" value="{{$settings->disqus}}" class="form-control">

                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="address">Adresse de la société</label>
                                            <input id="address" name="address" type="text" value="{{$settings->address}}" class="form-control">

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="contact_number">Numéro de téléphone</label>
                                            <input id="contact_number" name="contact_number" type="text" value="{{$settings->contact_number}}" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="chat_code">Code (Tawk To Chat) </label>
                                            <input id="chat_code" name="chat_code" type="text" value="{{$settings->chat_code}}" class="form-control">

                                        </div>
                                    </div>



                                </div>
                                <a href="{{route('adminIndex')}}" class="btn btn-rose">Annuler</a>

                                <button type="submit" class="btn btn-success pull-right">Sauvegarder</button>

                                <div class="clearfix"></div>

                            </form>


                        </div>
                        <div class="tab-pane" id="features">

                            <form action="{{route('featuresSettings',['id'=>$settings->id])}}" method="post">
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

                                    <div class="col-md-4">
                                        <p class="text-danger text-center"> Paramètres (Paid To Click). Si vous désactivez. Tout le système PTC sera désactivé. </p>
                                            <div class="form-group label-floating">
                                                <select class="selectpicker" name="ptc" data-style="btn btn-info btn-round" title="Select Status" data-size="7">

                                                    <option value="0"
                                                            @if($settings->ptc == 0)
                                                            selected
                                                            @endif
                                                    >Désactiver</option>
                                                    <option value="1"
                                                            @if($settings->ptc == 1)
                                                            selected
                                                            @endif

                                                    >Activé</option>
                                                </select>
                                            </div>
                                    </div>

                                    <div class="col-md-4">
                                        <p class="text-danger text-center"> Paramètre (Pay Per Video). Si vous désactivez. Tout le système de PPV sera désactivé. </p>
                                        <div class="form-group label-floating">
                                            <select class="selectpicker" name="ppv" data-style="btn btn-success btn-round" title="Select Status" data-size="7">

                                                <option value="0"
                                                        @if($settings->ppv == 0)
                                                        selected
                                                        @endif
                                                >Désactiver</option>
                                                <option value="1"
                                                        @if($settings->ppv == 1)
                                                        selected
                                                        @endif

                                                >Activé</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-danger text-center"> Paramètres de (Preuve de paiement). Si vous désactivez alors personne ne peut voir la page de preuve de paiement. </p>
                                        <div class="form-group label-floating">
                                            <select class="selectpicker" name="payment_proof" data-style="btn btn-info btn-round" title="Select Status" data-size="7">

                                                <option value="0"
                                                        @if($settings->payment_proof == 0)
                                                        selected
                                                        @endif
                                                >Désactiver</option>
                                                <option value="1"
                                                        @if($settings->payment_proof == 1)
                                                        selected
                                                        @endif

                                                >Activé</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <br>
                                <div class="row">

                                    <div class="col-md-4">
                                        <p class="text-danger text-center"> Paramètres de (Dépôt et de retrait). Si vous désactivez, personne ne peut voir cette information (HomePage). </p>
                                        <div class="form-group label-floating">
                                            <select class="selectpicker" name="latest_deposit" data-style="btn btn-info btn-round" title="Select Status" data-size="7">

                                                <option value="0"
                                                        @if($settings->latest_deposit == 0)
                                                        selected
                                                        @endif
                                                >Désactiver</option>
                                                <option value="1"
                                                        @if($settings->latest_deposit == 1)
                                                        selected
                                                        @endif

                                                >Activé</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-danger text-center"> Paramètres de (transfert de fonds). Si vous désactivez, personne ne peut transférer de fond entre membre.</p>
                                        <div class="form-group label-floating">
                                            <select class="selectpicker" name="transfer" data-style="btn btn-success btn-round" title="Select Status" data-size="7">

                                                <option value="0"
                                                        @if($settings->transfer == 0)
                                                        selected
                                                        @endif
                                                >Désactiver</option>
                                                <option value="1"
                                                        @if($settings->transfer == 1)
                                                        selected
                                                        @endif

                                                >Activé</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-danger text-center"> Paramètres de (Chat en direct). Si vous désactivez, personne ne peut utiliser le chat en direct. </p>
                                        <div class="form-group label-floating">
                                            <select class="selectpicker" name="live_chat" data-style="btn btn-info btn-round" title="Select Status" data-size="7">

                                                <option value="0"
                                                        @if($settings->live_chat == 0)
                                                        selected
                                                        @endif
                                                >Désactiver</option>
                                                <option value="1"
                                                        @if($settings->live_chat == 1)
                                                        selected
                                                        @endif

                                                >Activé</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <hr>
                                <br>
                                <div class="row">

                                    <div class="col-md-4">
                                        <p class="text-danger text-center"> Paramètres de (Mise à niveau d'abonnement). Si vous désactivez, personne ne peut voir l'option de mise à niveau. </p>
                                        <div class="form-group label-floating">
                                            <select class="selectpicker" name="membership_upgrade" data-style="btn btn-info btn-round" title="Select Status" data-size="7">

                                                <option value="0"
                                                        @if($settings->membership_upgrade == 0)
                                                        selected
                                                        @endif
                                                >Désactiver</option>
                                                <option value="1"
                                                        @if($settings->membership_upgrade == 1)
                                                        selected
                                                        @endif

                                                >Activé</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <p class="text-danger text-center"> Paramètres (d'investissement). Si vous désactivez, personne ne peut voir le système d'investissement. </p>
                                        <div class="form-group label-floating">
                                            <select class="selectpicker" name="invest" data-style="btn btn-success btn-round" title="Select Status" data-size="7">

                                                <option value="0"
                                                        @if($settings->invest == 0)
                                                        selected
                                                        @endif
                                                >Désactiver</option>
                                                <option value="1"
                                                        @if($settings->invest == 1)
                                                        selected
                                                        @endif

                                                >Activé</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <br>


                                <a href="{{route('adminIndex')}}" class="btn btn-rose">Annuler</a>

                                <button type="submit" class="btn btn-warning pull-right">Sauvegarder</button>

                                <div class="clearfix"></div>

                            </form>


                        </div>
                        <div class="tab-pane" id="settings">


                            <form action="{{route('usersSettings',['id'=>$settings->id])}}" method="post">
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

                                    <div class="col-md-4">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="minimum_deposit">Dépôt minimum (en Euro)</label>
                                            <input id="minimum_deposit" name="minimum_deposit" type="text" value="{{$settings->minimum_deposit +0}}" class="form-control">

                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="minimum_withdraw">Retrait minimum (en Euro)</label>
                                            <input id="minimum_withdraw" name="minimum_withdraw" type="text" value="{{$settings->minimum_withdraw +0}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="self_transfer">Commission d'autotransfert (en pourcentage)</label>
                                            <input id="self_transfer" name="self_transfer" type="text" value="{{$settings->self_transfer + 0}}" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="other_transfer">Commission de transfert entre membre (en pourcentage)</label>
                                            <input id="other_transfer" name="other_transfer" type="text" value="{{$settings->other_transfer + 0}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="signup_bonus">Bonus d'inscription normal (en Euro)</label>
                                            <input id="signup_bonus" name="signup_bonus" type="text" value="{{$settings->signup_bonus + 0}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="link_share">Prime de parrainage de partage du lien nosclick (en Euro)</label>
                                            <input id="link_share" name="link_share" type="text" value="{{$settings->link_share + 0}}" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="referral_signup">Bonus de parrainage d'inscription (en Euro)</label>
                                            <input id="referral_signup" name="referral_signup" type="text" value="{{$settings->referral_signup + 0}}" class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label  class="control-label" for="referral_deposit">Commission parrainage de dépôt (en pourcentage)</label>
                                            <input id="referral_deposit" name="referral_deposit" type="text" value="{{$settings->referral_deposit + 0}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label  class="control-label" for="referral_advert">Commission de parrainage PTC & PPV (en pourcentage)</label>
                                            <input id="referral_advert" name="referral_advert" type="text" value="{{$settings->referral_advert + 0}}" class="form-control">

                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group label-floating">

                                            <label  class="control-label" for="referral_upgrade">Commission parrainage de mise à niveau d'abonnement (en pourcentage)</label>
                                            <input id="referral_upgrade" name="referral_upgrade" type="text" value="{{$settings->referral_upgrade + 0}}" class="form-control">

                                        </div>
                                    </div>


                                </div>

                                <a href="{{route('adminIndex')}}" class="btn btn-rose">Annuler</a>

                                <button type="submit" class="btn btn-success pull-right">Sauvegarder</button>

                                <div class="clearfix"></div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection