@extends('layouts.dashboard')
@section('title', 'Confirmation')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <h2 class="title">Confirmation</h2>
                        <h5 class="description">Veuillez vérifier les informations ci-dessous. Nous vous remercions de votre confiance. Votre argent sera toujours en sécurité chez nous. </h5>
                    </div>
                </div>


                <div class="card-content">
                    <br>


                            <div class="col-md-6 col-md-offset-3">
                                <div class="card card-pricing card-raised">
                                    <div class="card-content">
                                        <h6 class="category">Résumé d'investissement</h6>
                                        <div class="icon icon-rose"><img src="/img/investment.png" />
                                            
                                        </div>
                                        <h4 class="card-title text-primary">
                                            <span class="pull-left text-info">Votre solde :<b> €{{Auth::user()->profile->deposit_balance + 0}}</b></span>
                                        </h4><br>
                                        <h4 class="card-title text-primary">
                                            <span class="pull-left text-info">Montant à investir :<b> €{{$invest->amount}}</b></span>
                                        </h4><br>
                                        <h4 class="card-title text-primary">
                                            <span class="pull-left text-info">Bénéfice :<b> €{{$invest->profit}}</b></span>
                                        </h4><br>
                                        <h5 class="card-title text-primary">
                                            <span class="pull-left text-info">Retour total :<b> €{{$invest->total}}</b></span>
                                        </h5>
                                        <br><br><br>

                                        <button class="btn btn-raised btn-round btn-info" data-toggle="modal" data-target="#investModal{{$invest->id}}">
                                            Confirmer votre investissement
                                        </button>
                                    </div>
                                </div>
                            </div>
                    <!-- small modal -->
                    <div class="modal fade" id="investModal{{$invest->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-small ">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h5>Veuillez acceptez nos termes et conditions</h5>
                                </div>
                                <form action="{{route('userInvestment.confirm')}}" method="post">
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

                                    <div class="modal-body">

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="tos" value="1" > Je suis d'accord avec vos
                                                <a href="{{route('viewPage', $tos->slug)}}" target="_blank">Termes et conditions</a>.
                                            </label>
                                        </div>

                                        <input type="hidden" name="plan_id" value="{{$invest->id}}">
                                        <input type="hidden" name="amount" value="{{$invest->amount}}">

                                    </div>

                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-simple" data-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-success btn-sm">Confirmer l'investissement</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--    end small modal -->


                </div>
            </div>
        </div>
    </div>




@endsection