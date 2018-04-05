@extends('layouts.dashboard')
@section('title', 'Dépôts sur votre compte')
@section('content')
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">


                <div class="row">
                
                    <div class="col-sm-6 col-sm-offset-5">
                        <form action="{{config('payeer.url')}}" method="POST">
                            

                                <input   type="hidden"   name="m_shop"   value="{{$payeer['m_shop']}}">
                                <input   type="hidden"   name="m_orderid"   value="{{$payeer['m_orderid']}}">
                                <input   type="hidden"   name="m_amount"   value="{{$payeer['m_amount']}}">
                                <input   type="hidden"   name="m_curr"   value="{{$payeer['m_curr']}}">
                                <input   type="hidden"   name="m_desc"   value="{{$payeer['m_desc']}}">
                                <input   type="hidden"   name="m_sign"   value="{{$payeer['sign']}}">
                            
                                <input class="" id="pay_card_button" type="submit" name="m_process" value=""/>

								 </form>

                       
                        <br><br>
						</div>
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
