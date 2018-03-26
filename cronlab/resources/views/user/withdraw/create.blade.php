@extends('layouts.dashboard')
@section('title', 'Retrait')
@section('content')


    <div class="row">
        <div class="col-md-9">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Retrait d'argent
                        <!--<small class="category">Retiré votre argent vers votre portefeuille en utilisant un de nos processeurs.</small>-->
                    </h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="nav nav-pills nav-pills-icons nav-pills-primary nav-stacked" role="tablist">

                                <li class="active">
                                    <a href="#withdraw" role="tab" data-toggle="tab">
                                        <i class="material-icons">money_off</i>Retrait
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">

                                <div class="tab-pane active" id="withdraw">


                                    <div class="alert alert-info alert-with-icon">
									<i class="material-icons" data-notify="icon">notifications</i>
                                       <!-- <span class="text">Les frais de transaction sont les suivants :</span><br>-->
                                        @php $id=0;@endphp
                                        @foreach($gateways as $gateway)
                                            @php $id++;@endphp
                                            <span><div class="card" style="width:40%"><img src="{{$gateway->image}}" /></div> <br> {{$id}}. <b>@if($gateway->name){{$gateway->name}}@endif @if($gateway->local_name){{$gateway->local_name}}@endif</b> vous facture <b>€ {{$gateway->fixed}}</b> fixe + <b>{{$gateway->percent}}%</b></span>
                                        @endforeach
                                    </div>

                                    <form action="{{route('userWithdraw.post')}}" method="post">
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
                                            <br>
                                        @endif

                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-1">
                                                <div class="form-group label-floating">
                                                    <select class="selectpicker" name="gateway" data-style="btn btn-warning btn-round" title="Processeur de retrait" data-size="7">

                                                        @if($gate->status == 1)
                                                        <option value="1000">{{$gate->name}}</option>
                                                        @endif

                                                        @foreach($gateways as $gateway)
                                                            <option value="{{$gateway->id}}">{{$gateway->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">

                                            <div class="col-md-6 col-md-offset-1">
                                                <div class="form-group label-floating">

                                                    <label  class="control-label" for="account">Votre compte</label>
                                                    <input id="account" name="account" type="text" class="form-control">

                                                </div>
                                            </div>
                                        </div>
										


                                        <br>
                                        <div class="row">

                                            <div class="col-md-6 col-md-offset-1">

                                                <div class="form-group label-floating">

                                                    <label  class="control-label" for="amount">Montant du retrait</label>
                                                    <input id="amount" name="amount" type="text" class="form-control">

                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <br>
                                        <br>
										<button type="submit" class="btn btn-success pull-right">Valider</button>
                                        <a href="{{route('userWithdraws')}}" class="btn btn-rose pull-right">Annuler</a>

                                        
                                        <div class="clearfix"></div>
                                    </form>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        

            <div class="col-md-3">
                <div class="card card-content">
                    <div class="card-content">
                     

                        <div class="card card-stats">
                            <div class="card-header" ><img src="/img/solde.png" style="width:80%"/>
                               
                            </div>
                            <div class="card-content">
                                <p class="category"></p>
                                <h4 class="card-title">€{{$user->profile->main_balance +0}}</h4>
                            </div>
							 <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-success">eject</i> Compte principal
                                </div>
                        </div>
                 
					
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection