@extends('layouts.dashboard')
@section('title', 'Dépôt')
@section('content')


    <div class="row">
        <div class="col-md-9">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Dépôt d'argent
                        <!--<small class="category">Augmenter le solde de votre compte en utilisant le dépôt instantané et le dépôt local.</small>-->
                    </h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="nav nav-pills nav-pills-icons nav-pills-primary nav-stacked" role="tablist">

                               <li class="active">
                                   <a href="#instant_stripe" role="tab" data-toggle="tab">
                                        <i class="material-icons">flash_on</i>Stripe
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#instant_payeer" role="tab" data-toggle="tab">
                                        <i class="material-icons">flash_on</i>Payeer
                                    </a>
                                </li>

                                <li>
                                    <a href="#local" role="tab" data-toggle="tab">
                                        <i class="material-icons">flash_on</i>Dépôt différé
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">

                                <div class="tab-pane active" id="instant_stripe">
                                    <div class="alert alert-info alert-with-icon">
									<i class="material-icons" data-notify="icon">notifications</i>
                                        <!--<span class="text-left">Les frais de transaction sont les suivants :</span><br>-->
                                       @foreach($gateways as $gateway)
                                           @if($gateway->name=='Stripe')
                                            <span><div class="card" style="width:40%" ><img src="{{$gateway->image}}"/></div> <br>  {{$gateway->id}}. <b>{{$gateway->name}}</b> vous facture <b>€ {{$gateway->fixed}}</b> fixe + <b>{{$gateway->percent}}%</b></span>
                                            @endif
                                        @endforeach

                                    </div>


                                    <form action="{{route('instantPreview')}}" method="post">
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
                                                    <select class="selectpicker" name="gateway" data-style="btn btn-warning btn-round" title="Processeur de paiement" data-size="7">
                                                        @foreach($gateways as $gateway)
                                                            @if($gateway->name=='Stripe')
                                                            <option selected value="{{$gateway->id}}">{{$gateway->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">

                                            <div class="col-md-6 col-md-offset-1">

                                                <div class="form-group label-floating">
                                                    <label  class="control-label" for="amount">Montant du dépôt</label>
                                                    <input id="amount" name="amount" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
										<button type="submit" class="btn btn-success pull-right">Valider</button>
                                        <a href="{{route('userDeposits')}}" class="btn btn-rose pull-right">Annuler</a>
                                        <div class="clearfix"></div>
                                    </form>


                                </div>

                                <div class="tab-pane active" id="instant_payeer">
                                    <div class="alert alert-info alert-with-icon">
                                        <i class="material-icons" data-notify="icon">notifications</i>
                                        <!--<span class="text-left">Les frais de transaction sont les suivants :</span><br>-->
                                        @foreach($gateways as $gateway)
                                            @if($gateway->name=='Payeer')
                                                <span><div class="card" style="width:40%" ><img src="{{$gateway->image}}"/></div> <br>  {{$gateway->id}}. <b>{{$gateway->name}}</b> vous facture <b>€ {{$gateway->fixed}}</b> fixe + <b>{{$gateway->percent}}%</b></span>
                                            @endif
                                        @endforeach

                                    </div>


                                    <form action="{{route('instantPreview')}}" method="post">
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
                                                    <select class="selectpicker" name="gateway" data-style="btn btn-warning btn-round" title="Processeur de paiement" data-size="7">
                                                        @foreach($gateways as $gateway)
                                                            @if($gateway->name=='Payeer')
                                                                <option selected value="{{$gateway->id}}">{{$gateway->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-1">
                                                <div class="form-group label-floating">
                                                    <label  class="control-label" for="amount">Montant du dépôt</label>
                                                    <input id="amount" name="amount" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <button type="submit" class="btn btn-success pull-right">Valider</button>
                                        <a href="{{route('userDeposits')}}" class="btn btn-rose pull-right">Annuler</a>
                                        <div class="clearfix"></div>
                                    </form>


                                </div>



                                <div class="tab-pane" id="local">
                                    <div class="alert alert-info alert-with-icon">
									<i class="material-icons" data-notify="icon">notifications</i>
                                        <!--<span class="text-left">Les frais de transaction sont les suivants :</span><br>-->
                                        @php $id=0;@endphp
                                        @foreach($local_gateways as $local)
                                            @php $id++;@endphp
                                            <span><div class="card" style="width:40%"><img src="{{$local->image}}"/></div> <br> {{$id}}. <b>{{$local->name}}</b> vous facture <b>€ {{$local->fixed}}</b> fixe + <b>{{$local->percent}}%</b> </span>
                                        @endforeach
                                    </div>

                                    <form action="{{route('userPaymentPreview')}}" method="post">
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
                                                    <select class="selectpicker" name="gateway" data-style="btn btn-warning btn-round" title="Processeur de paiement" data-size="7">

                                                        @foreach($local_gateways as $local)
                                                            <option value="{{$local->id}}">{{$local->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="row">

                                            <div class="col-md-6 col-md-offset-1">

                                                <div class="form-group label-floating">

                                                    <label  class="control-label" for="amount">Montant du dépôt</label>
                                                    <input id="amount" name="amount" type="text" class="form-control">

                                                </div>
                                            </div>
                                        </div>


                                        <br>
                                        <br>
										<button type="submit" class="btn btn-success pull-right">Valider</button>
                                        <a href="{{route('userDeposits')}}" class="btn btn-rose pull-right">Annuler</a>
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
                            <div class="card-header" ><img src="/img/deposit.png" style="width:80%"/>
                               
                            </div>
                            <div class="card-content">
                                <p class="category"></p>
                                <h4 class="card-title">€{{$user->profile->deposit_balance + 0}}</h4>
                            </div>
							
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-success">eject</i> Compte dépôt
                                </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>



@endsection