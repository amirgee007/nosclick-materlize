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
                        <form action="{{config('payeer.url')}}" method="POST">
                            {{--{{csrf_field()}}--}}

                                <input   type="hidden"   name="m_shop"   value="{{$payeer['m_shop']}}">
                                <input   type="hidden"   name="m_orderid"   value="{{$payeer['m_orderid']}}">
                                <input   type="hidden"   name="m_amount"   value="{{$payeer['m_amount']}}">
                                <input   type="hidden"   name="m_curr"   value="{{$payeer['m_curr']}}">
                                <input   type="hidden"   name="m_desc"   value="{{$payeer['m_desc']}}">
                                <input   type="hidden"   name="m_sign"   value="{{$payeer['sign']}}">

                                <input id="pay_card_button" data-image="https://nosclick.com/img/marketplace.png"
                                       data-locale="fr"
                                       data-currency="EUR" class="btn btn-info"  data-description="Veuillez remplir les informations" type="submit" name="m_process" value="Pay with Card"/>
                        </form>
                        <br><br>
						</div>
                </div>
           </div>
        </div>
    </div>

    <script>
        jQuery(function(){
            $('#pay_card_button').click();
        });
    </script>

@endsection
