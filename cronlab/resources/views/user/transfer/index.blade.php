@extends('layouts.dashboard')
@section('title', 'Transfert')
@section('content')


    <div class="row">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header card-header-tabs" data-background-color="green">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">Transfert</span>
						

                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#self" data-toggle="tab">
                                        <i class="material-icons">assignment_returned</i> Interne
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                @if($settings->transfer == 1)
                                <li class="">
                                    <a href="#other" data-toggle="tab">
                                        <i class="material-icons">assignment_return</i> Autre
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                    @endif

                            </ul>
                        </div>
                    </div>
                </div>
                <br>
                <br>


                <div class="card-content">
                    <h4 class="card-title">Transfert d'argent
                      <small class="category"> - Interne ou vers un autre compte membre</small>
                    </h4>
                    <br>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="self">

                            <form action="{{route('userFundsTransfer.self')}}" method="post">
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
                                <div class="col-md-5 col-md-offset-2">
                                    <div class="form-group label-floating">
                                     <p>de</p>
                                        <select class="selectpicker" name="account" data-style="btn btn-info btn-round" title="Select Status" data-size="7">
                                            <option value="1" > Compte dépôt</option>
                                            <option value="2" > Compte principal</option>
                                            <option value="3" selected> Compte parrainage</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-md-offset-2">

                                        
                                        <div class="wrap-input100 validate-input">
                                                    <input id="amount" name="amount" type="number" class="input100">
                                            <span class="focus-input100"></span>
                                            <span class="label-input100">Montant en EURO</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-md-offset-2">
                                    <div class="form-group label-floating">
                                            <p>vers</p>
                                        <select class="selectpicker" name="transfer" data-style="btn btn-info btn-round" title="Select Status" data-size="7">
                                            <option value="1" selected >Compte dépôt</option>
                                            <option value="2" >Compte principal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <br>
                            <br>
							 <br>
                            <br>
								<button type="submit" class="btn btn-success pull-right">Valider</button>
                                <a href="{{route('userDashboard')}}" class="btn btn-rose pull-right">Annuler</a>

                                
                                <div class="clearfix"></div>
                            </form>


                        </div>
                        @if($settings->transfer == 1)
                        <div class="tab-pane" id="other">

                            <form action="{{route('userFundsTransfer.others')}}" method="post">
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
                                <div class="col-md-5 col-md-offset-2">

                                    <div class="form-group label-floating">
                                        <select class="selectpicker" name="account" data-style="btn btn-info btn-round" title="Select Status" data-size="7">
                                            <option value="1" selected >Compte principal</option>
                                            <option value="2" >Compte dépôt</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5 col-md-offset-2">

                                        
                                        <div class="wrap-input100 validate-input">
                                         <input id="email" name="email" type="email" class="input100">
                                            <span class="focus-input100"></span>
                                            <span class="label-input100">E-mail du destinataire</span>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-md-offset-2">
                                    
                                
                                        
                                        <div class="wrap-input100 validate-input">
                                         <input id="amount" name="amount" type="number" class="input100">
                                            <span class="focus-input100"></span>
                                            <span class="label-input100">Montant en EURO</span>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
							 <br>
                            <br>
							<br>
								 <button type="submit" class="btn btn-success pull-right">Valider</button> 
                                <a href="{{route('userDashboard')}}" class="btn btn-rose pull-right">Annuler</a>

                               
                                <div class="clearfix"></div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>





            <div class="clearfix"></div>


        </div>

      
            <div class="col-md-4">
                <div class="card card-content">
                    <div class="card-content">
                       

                        <div class="card card-stats">
                            <div class="card-header" ><img src="/img/solde.png" style="width:50%"/>
                               
                            </div>
                            <div class="card-content">
                                <p class="category">EUR</p>
                                <h5 class="card-title">€ {{Auth::user()->profile->main_balance + 0}}</h5>
                            </div>
							<br>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-success">eject</i> Compte principal
                                </div>
                            </div>
                        </div>


                        <div class="card card-stats">
                            <div class="card-header" ><img src="/img/affiliate.png" style="width:50%"/>
                                
                            </div>
                            <div class="card-content">
                                <p class="category">EUR</p>
                                <h5 class="card-title">€ {{Auth::user()->profile->referral_balance + 0}}</h5>
                            </div>
							<br>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-success">eject</i> Compte parrainage
                                </div>
                            </div>
                        </div>
                        <div class="card card-stats">
                            <div class="card-header" ><img src="/img/deposit.png" style="width:50%"/>
                              
                            </div>
                            <div class="card-content">
                                <p class="category">EUR</p>
                                <h5 class="card-title">€ {{Auth::user()->profile->deposit_balance + 0}}</h5>
                            </div>
							<br>
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