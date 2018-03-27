@extends('layouts.dashboard')
@section('title', 'Dépôts sur votre compte')
@section('content')
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="card card-content">
                <div class="card-content">
                    <div class="alert alert-with-icon">
                        <i class="material-icons" data-notify="icon">notifications</i>
                        <center> <span><div class="card"><img src="{{$gateway->image}}" style="width:50%"/> <br>Vous souhaitez effectué un dépôt via <b>{{$gateway->name}}</b></span><br><br></center>
                    </div><br><br>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="card">
                                <center> <h6><span class="text">Compte dépôts : </span><span class="text-primary"><b>€{{$user->profile->deposit_balance +0}}</b></span></h6></center>
                                <center> <h6><span class="text">Montant du dépôts : </span><span class="text-primary"><b>€{{$deposit->amount +0}}</b></span></h6></center>
                                <center> <h6><span class="text">Frais de traitement : </span><span class="text-primary"><b>€{{$deposit->charge + 0}}</b></span></h6></center>
                                <center> <h6><span class="text">Montant + Frais : </span><span class="text-primary"><b>€{{($deposit->amount + $deposit->charge) + 0}}</b></span></h6></center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        <form action="{{route('stripeConfirm')}}" method="POST">
                            {{csrf_field()}}
                                <script id="pay_card_button"
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{{$gateway->val1}}"
                                    data-amount="{{$deposit->amount * 100}}"
                                    data-name="NOSCLICK"
                                    data-description="Veuillez remplir les informations"
                                    data-image="https://nosclick.com/img/marketplace.png"
                                    data-locale="fr"
                                    data-currency="EUR">
                                    </script>
                                            <input type="hidden" name="code" value="{{$deposit->code}}">
                                            <input type="hidden" name="amount" value="{{$deposit->amount}}">
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </form>
                        <br><br>
						</div>
                </div>
           </div>
        </div>
    </div>
    <script>
        jQuery(function(){
            $('.stripe-button-el').click();
        });
    </script>
@endsection
