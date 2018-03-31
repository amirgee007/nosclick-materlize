@extends('layouts.dashboard')
@section('title', 'Dépôts sur votre compte')
@section('content')


        <div class="row">

            <div class="col-md-12 col-md-offset-0">

                    <div class="card-content"> 
                        
                     
                        <div class="alert alert-with-icon">
						<i class="material-icons" data-notify="icon">notifications</i>
                        <center><p> <span><div class=""><img src="{{$gateway->image}}"style="width:50%"/><br><br> dépôt avec <b>{{$gateway->name}}</b></span><span> Lisez attentivement les instructions ci-dessous.<br><br></span><p></center>
                        </div><br><br>




                        <div class="row">
                            <div class="col-md-12 col-md-offset-0">
                            <div class="alert card-content">

                               <center> <p><span class="text">Compte dépôts : </span><span class="text-primary"><b>€{{$user->profile->deposit_balance +0}}</b></span><p></center>
                               <center> <p><span class="text">Montant du dépôts : </span><span class="text-primary"><b>€{{$deposit->amount +0}}</b></span></p></center>
                               <center> <p><span class="text">Frais de traitement : </span><span class="text-primary"><b>€{{$deposit->charge + 0}}</b></span></p></center>
                               <center> <p><span class="text">Montant + Frais : </span><span class="text-primary"><b>€{{($deposit->amount + $deposit->charge) + 0}}</b></span></p></center>
                            </div>
                           </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-md-offset-0">
                                <div class="alert card-content">
						
                              <div class=""><center><p> Processeur : <span class="text-primary"><b>{{$gateway->name}} </b></span></p></center>
                              <center><p> Notre compte : <span class="text-primary"><b>{{$gateway->account}}</b></span> </p> </center>
							  <center><p>Code de référence : <span class="text-primary"><b>{{$deposit->code}} </b></span></p> </center>
                                @if($gateway->details)

                          
                                   

                                @endif
                            </div>
                        </div>

                                <div class="row">
                                <div class="col-md-12 col-md-offset-0">
                                    <div class="alert card-content">
                        <br>  <p> <ul>

							    Comment faire un dépôt via {{$gateway->name}}?<br><br>
                                <li class="text-info">Étape 1: Connectez-vous sur votre compte {{$gateway->name}}.</li>
                                <li class="text-info">Étape 2: Introduisez ce code "{{$deposit->code}}" dans les détails de transfert de {{$gateway->name}}.</li>
                                <li class="text-info">Étape 3: Valider votre transfert sur {{$gateway->name}}. Puis cliquez sur le bouton "Confirmer".</li>
                              	<br>
								Veuillez lire attentivement ce qui suit :<br><br>
								<li class="text">N'oubliez pas de mentionné votre code de référence : "{{$deposit->code}}".</li> 
								<li class="text">Les transferts dont la référence n'est pas mentionné ont un temps de traitement long!</li>
								<li class="text">Cliquez uniquement sur le bouton "Confirmer" ci-dessous, si un tranfert à été réellement effectué.</li>
								<br></ul><p><br>

                      
                        <div class="row">
                            <form action="{{route('userDepConfirm')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="gateway" value="{{$gateway->id}}" />
                                <input type="hidden" name="reference" value="{{$deposit->code}}" />
                                <input type="hidden" name="amount" value="{{$deposit->amount}}" />

                                <div class="form-group">
                                     <div class="col-md-10 col-md-offset-1">
                                        <button class="btn btn-success pull-right">
										<i class="fa fa-send"></i> Confirmer</button>
                                    </div><br><br>
                                </div>
                            </form><br>
                        </div>
                                    </div>
                                </div>


   


@endsection
