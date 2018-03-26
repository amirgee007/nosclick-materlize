@extends('layouts.public')
@section('title', 'Payeer')
@section('content')

    <body class="section-white">
    <div class="cd-section" id="headers">
        <div class="header-1">
            <div class="page-header header-filter" style="background-image: url('{{asset('img/bg12.jpg')}}');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">

                            <form   method="post"   action="https://payeer.com/merchant/">
                                <input   type="hidden"   name="m_shop"   value="<?=$m_shop?>">
                                <input   type="hidden"   name="m_orderid"   value="<?=$m_orderid?>">
                                <input   type="hidden"   name="m_amount"   value="<?=$m_amount?>">
                                <input   type="hidden"   name="m_curr"   value="<?=$m_curr?>">
                                <input   type="hidden"   name="m_desc"   value="<?=$m_desc?>">
                                <input   type="hidden"   name="m_sign"   value="<?=$sign?>">
                               <input   type="hidden"   name="form[curr[2609]]"   value="USD">
                                <input   type="hidden"   name="m_cipher_method"   value="AES-256-CBC">
                                <input class="btn btn-success" type="submit" name="m_process" value="Pay 100$"/>
                            </form>



                            {{--<form method="post" action="https://payeer.com/merchant/" target="_blank">--}}
                                {{--<input type="hidden" name="m_shop" value="521744096">--}}
                                {{--The   merchant’s   ID--}}
                                {{--<input type="hidden" name="m_orderid" value="1">--}}
                                {{--<input type="hidden" name="m_amount" value="100.00">--}}
                                {{--<input type="hidden" name="m_curr" value="USD">--}}
                                {{--USD,   EUR,   RUB--}}
                                {{--<input type="hidden" name="m_desc" value="dGVzdA==">--}}
                                {{--<input type="hidden" name="m_sign" value="9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F 00A08">--}}
                                 {{--<input type="hidden" name="form[ps]" value="2609">--}}
                                {{--<input type="hidden" name="form[curr[2609]]" value="USD">--}}
                                {{--<input type="hidden" name="m_params" value="">--}}
                                {{--<input type="hidden" name="success_url" value="http://nosclicks.dev/success">--}}
                                {{--<input type="hidden" name="fail_url" value="http://nosclicks.dev/success">--}}
                                {{--<input type="hidden" name="reference " value="[]">--}}
                                {{--<input class="btn btn-success" type="submit" name="m_process" value="Pay 30$"/>--}}
                            {{--</form>--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            @include('includes.public.footer')
        </footer>
    </div>
    </body>

@endsection