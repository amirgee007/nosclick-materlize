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
<i class="material-icons">credit_card</i>Stripe live</a></li>                                

<li class="">                                    
<a href="#instant_payeer" role="tab" data-toggle="tab">                                        
<i class="material-icons">timeline</i>Payeer live</a></li>                                


    <li>
        <a href="#payza" role="tab" data-toggle="tab">
            <i class="material-icons">swap_horiz</i>Payza</a></li>

    <li>
        <a href="#perfectmoney" role="tab" data-toggle="tab">
            <i class="material-icons">swap_horiz</i>PerfectMoney</a></li>

    <li>
        <a href="#neteller" role="tab" data-toggle="tab">
            <i class="material-icons">swap_horiz</i>Neteller</a></li>
</ul>                        
</div>                        

<div class="col-md-9">                            
<div class="tab-content">                                
<div class="tab-pane active" id="instant_stripe">                                    
<div class="alert alert-stripe alert-info alert-with-icon">									
<i class="material-icons" data-notify="icon">notifications</i> 
<img src="/img/stripe20.png"/>
<!--<span class="text-left">Les frais de transaction sont les suivants :</span><br>-->                                       

@foreach($gateways as $gateway)                                           
@if($gateway->name=='Stripe')                                            

                                         
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
@foreach($gateways as $gateway)                                            
@if($gateway->name=='Stripe')                                                
	
<input type="hidden" name="gateway" value="{{$gateway->id}}">                                            

@endif                                        
@endforeach                                        

<br>                                        

<div class="row">                                            
<div class="col-md-6 col-md-offset-1">                                                
<div class="wrap-input100 validate-input">                                                    
<input id="amount" name="amount" type="number" class="input100" required autofocus>                                                    
<span class="focus-input100"></span>                                                    
<span class="label-input100">Montant en EURO</span>                                                
</div>                                            
</div>                                        
</div>                                        
<br><br><br><br><br>

    <button type="submit" class="btn btn-success pull-right">Payer avec Stripe</button>
<a href="{{route('userDeposits')}}" class="btn btn-rose pull-right">Annuler</a>                                        
<div class="clearfix"></div>                                    
</form>                                
</div>                                

<div class="tab-pane" id="instant_payeer">                                    
<div class="alert alert-payeer alert-info alert-with-icon">                                        
<i class="material-icons" data-notify="icon">notifications</i>
<img src="/img/payeer20.png"/>
                                                                    
@foreach($gateways as $gateway)                                            
@if($gateway->name=='Payeer')                                                
 

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
@foreach($gateways as $gateway)                                            
@if($gateway->name=='Payeer')                                                
	
<input type="hidden" name="gateway" value="{{$gateway->id}}">                                            

@endif                                        
@endforeach                                        

<br>                                        
<div class="row">                                            
<div class="col-md-6 col-md-offset-1">                                                
<div class="wrap-input100 validate-input">                                                    
<input id="amount" name="amount" type="number" class="input100" required autofocus>                                                    
<span class="focus-input100"></span>                                                    
<span class="label-input100">Montant en EURO</span>                                                
</div>                                            
</div>                                        
</div>
    <br><br><br><br><br>
<button type="submit" class="btn btn-success pull-right">Payer avec Payeer</button>                                        
<a href="{{route('userDeposits')}}" class="btn btn-rose pull-right">Annuler</a>                                        
<div class="clearfix"></div>                                    

</form>                                
</div>                                






    <div class="tab-pane" id="payza">
        <div class="alert alert-payza alert-info alert-with-icon">
            <i class="material-icons" data-notify="icon">notifications</i>
            <img src="/img/payza20.png"/>

            @foreach($gateways as $gateway)
                @if($gateway->name=='Payza')


                @endif
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
            @foreach($local_gateways as $local_gateway)
                @if($local_gateway->name=='Payza')

                    <input type="hidden" name="gateway" value="{{$local_gateway->id}}">

                @endif
            @endforeach

            <br>
            <div class="row">
                <div class="col-md-6 col-md-offset-1">
                    <div class="wrap-input100 validate-input">
                        <input id="amount" name="amount" type="number" class="input100" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Montant en EURO</span>
                    </div>
                </div>
            </div>
            <br><br><br><br><br>
            <button type="submit" class="btn btn-success pull-right">Payer avec Payza</button>
            <a href="{{route('userDeposits')}}" class="btn btn-rose pull-right">Annuler</a>
            <div class="clearfix"></div>

        </form>
    </div>

    <div class="tab-pane" id="perfectmoney">
        <div class="alert alert-perfectmoney alert-info alert-with-icon">
            <i class="material-icons" data-notify="icon">notifications</i>
            <img src="/img/perfectmoney20.png"/>

            @foreach($gateways as $gateway)
                @if($gateway->name=='PerfectMoney')


                @endif
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
            @foreach($local_gateways as $local_gateway)
                @if($local_gateway->name=='PerfectMoney')

                    <input type="hidden" name="gateway" value="{{$local_gateway->id}}">

                @endif
            @endforeach

            <br>
            <div class="row">
                <div class="col-md-6 col-md-offset-1">
                    <div class="wrap-input100 validate-input">
                        <input id="amount" name="amount" type="number" class="input100" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Montant en EURO</span>
                    </div>
                </div>
            </div>
            <br><br><br><br><br>
            <button type="submit" class="btn btn-success pull-right">Payer avec PerfectMoney</button>
            <a href="{{route('userDeposits')}}" class="btn btn-rose pull-right">Annuler</a>
            <div class="clearfix"></div>

        </form>
    </div>

    <div class="tab-pane" id="neteller">
        <div class="alert alert-neteller alert-info alert-with-icon">
            <i class="material-icons" data-notify="icon">notifications</i>
            <img src="/img/neteller20.png"/>

            @foreach($gateways as $gateway)
                @if($gateway->name=='Neteller')


                @endif
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
            @foreach($local_gateways as $local_gateway)
                @if($local_gateway->name=='Neteller')

                    <input type="hidden" name="gateway" value="{{$local_gateway->id}}">

                @endif
            @endforeach

            <br>
            <div class="row">
                <div class="col-md-6 col-md-offset-1">
                    <div class="wrap-input100 validate-input">
                        <input id="amount" name="amount" type="number" class="input100" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Montant en EURO</span>
                    </div>
                </div>
            </div>
            <br><br><br><br><br>
            <button type="submit" class="btn btn-success pull-right">Payer avec Neteller</button>
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
<div class="card-content">
<div class="card-content">                                              
<div class="card">
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