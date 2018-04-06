@extends('layouts.dashboard')
@section('title', 'Vérification du compte')
@section('content')


    @if($result1 && $result2)
        <h3 class="title text-center">Please wait we check your identity / address</h3>
    @else

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="row">
                        <div class="text-center">
                            <h5 class="title text-danger">Lisez ceci avant de soumettre</h5>
                        </div>
                    </div>

                    <div class="card-content">
                        <br>
                        <h4>Les documents suivants sont acceptés pour la vérification de l'identité:</h4>
                        <ul>
                            <li>Passeport international</li>
                            <li>Carte d'identité nationale</li>
                            <li>Permis de conduire</li>
                        </ul>
                        <br>
                        <h4>Les documents suivants ne sont pas acceptés pour la vérification de l'identité:</h4>
                        <ul>
                            <br>
                            <li>Carte d'électeur</li>
                            <li>Permis de séjour (uniquement en complément d'autres documents)</li>
                            <li>Carte d'assurance maladie</li>
                            <li>Cartes d'identité professionnelles</li>
                            <li>Cartes d'identité étudiant</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="row">
                        <div class="text-center">
                            <h5 class="title text-danger">Lisez ceci avant de soumettre</h5>
                        </div>
                    </div>

                    <div class="card-content">
                        <br>

                        <h4> Pour la vérification d'adresse sont acceptés les documents suivants:</h4>
                        <ul>
                            <li>Factures d'électricité (facture d'eau, facture d'électricité, facture de gaz, etc.)</li>
                            <li>Relevé bancaire</li>
                            <li>Facture de téléphone portable</li>
                            <li>Facture du fournisseur internet</li>
                            <li>Relevé de carte de crédit, etc.</li>
                        </ul>
                        <h5>Les factures de services publics / relevé bancaire ou toute autre facture fournie pour vérification doit correspondre aux critères suivants:</h5>
                        <ul>
                            <li>Il doit s'agir d'une copie de papier (pas en ligne)</li>
                            <li>La facture doit être au nom du membre</li>
                            <li>La facture doit contenir l'adresse du membre</li>
                            <li>La facture doit contenir une date récente (maximum 2 mois).</li>

                        </ul>


                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="title text-center">Remplissez le formulaire avec vos informations réelles</h3>
                <br />
                <div class="nav-center">
                    <ul class="nav nav-pills nav-pills-info nav-pills-icons" role="tablist">
                        @if($result1)

                        @else
                            <li class="active">
                                <a href="#identity" role="tab" data-toggle="tab">
                                    <i class="material-icons">gavel</i> Vérification d'identité
                                </a>
                            </li>
                        @endif

                        @if($result2)


                        @else
                            <li>
                                <a href="#paddress" role="tab" data-toggle="tab">
                                    <i class="material-icons">location_on</i> Justificatif de domicile
                                </a>
                            </li>

                        @endif
                    </ul>
                </div>
                <div class="tab-content">
                    @if($result1)

                    @else
                        <div class="tab-pane active" id="identity">
                            <div class="card">
                                <div class="card-content">
                                    <form action="{{route('userKyc.submit')}}" method="post" enctype="multipart/form-data">
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

                                        <br><br>
                                        <!--<div class="alert alert-info">
                                            <span>Si vous sélectionnez Passeport comme type de document, vous n'avez pas besoin de télécharger la deuxième page</span>
                                        </div>-->
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-4">
                                                <div class="form-group label-floating">
                                                    <select class="selectpicker" name="name" data-style="btn btn-warning btn-round" title="Type de document" data-size="7">
                                                        <option value="National ID Card">Carte d'identité</option>
                                                        <option value="International Passport">Passeport</option>
                                                        <option value="Driver License">Permis de conduire</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-1">

                                                <div class="form-group label-floating">
                                                    <label  class="control-label" for="number">Numéro du document</label>
                                                    <input id="number" name="number" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-md-offset-1">
                                                <div class="form-group label-floating">
                                                    <label  class="control-label" for="dob">Date de naissance</label>
                                                    <input id="dob" name="dob" type="date" class="form-control">
                                                </div>
                                            </div>

                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-4">
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Verso du document</span>
                                                        <span class="fileinput-exists">Changer le document</span>
                                                        <input type="file" name="front" />
                                                    </span>
                                                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Effacer</a>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-4">
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Recto du document</span>
                                                        <span class="fileinput-exists">Changer le document</span>
                                                        <input type="file" name="back" />
                                                    </span>
                                                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Effacer</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br><br>


                                        <a href="{{route('userDashboard')}}" class="btn btn-rose">Annuler</a>
                                        <button type="submit" class="btn btn-success pull-right">Soumettre</button>
                                        <div class="clearfix"></div>
                                    </form>




                                </div>
                            </div>
                        </div>
                    @endif

                    @if($result2)


                    @else
                        <div class="tab-pane" id="paddress">
                            <div class="card">
                                <div class="card-content">

                                    <form action="{{route('userKyc2.submit')}}" method="post" enctype="multipart/form-data">
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

                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-4">
                                                <div class="form-group label-floating">
                                                    <select class="selectpicker" name="name" data-style="btn btn-warning btn-round" title="Type de document" data-size="7">
                                                        <option value="Bank Statement">Relevé bancaire</option>
                                                        <option value="Utility Bills">Factures divers</option>
                                                        <option value="Credit Card Statement">Relevé de carte de crédit</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br>
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-4">
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Verso du document</span>
                                                        <span class="fileinput-exists">Changer le document</span>
                                                        <input type="file" name="photo" />
                                                    </span>
                                                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Effacer</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br><br>
                                        
                                        <a href="{{route('userDashboard')}}" class="btn btn-rose">Annuler</a>
                                        <button type="submit" class="btn btn-success pull-right">Soumettre</button>
                                        <div class="clearfix"></div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    @endif

@endsection