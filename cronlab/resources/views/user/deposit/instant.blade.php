@extends('layouts.dashboard')
@section('title', 'Dépôts sur votre compte')
@section('content')
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <div class="row">

        <div class="col-md-12 col-md-offset-0">
           <div class=" alert-stripe">
                <div class="tab-content">


                  </div>



                <div class="row">
                    <center> <img src="/img/stripe20.png" alt="" style="width:35%" /> </center> <br><br>
                    <div class="col-sm-6 col-sm-offset-5">

                        <form action="{{route('stripeConfirm')}}" method="POST">
                            {{csrf_field()}}
                                <script id="pay_card_button"
                                    src="https://checkout.stripe.com/checkout.js"  class="stripe-button"
                                    data-key="{{$gateway->val1}}"
                                    data-amount="{{$deposit->amount * 100}}"
                                    data-name="NOSCLICK"
                                    data-description="Veuillez remplir les informations"
                                    data-image="https://nosclick.com/img/marketplace.png"
                                    data-locale="fr"
                                    data-currency="EUR">
                                    </script> <br><br>
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
