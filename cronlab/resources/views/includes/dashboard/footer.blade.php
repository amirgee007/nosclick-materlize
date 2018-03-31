<div class="container-fluid">
    <nav class="pull-left">
       <h6> <ul>
            <li>
                <a href="{{route('contact')}}">
                    Contact
                </a>
            </li>
            @if($aml->status == 1)
                <li>
                    <a href="{{route('viewPage', $aml->slug)}}">
                        Politique AML & KYC
                    </a>
                </li>
            @endif
            @if($kyc->status == 1)
                <li>
                    <a href="{{route('viewPage', $kyc->slug)}}">
                        Politique de KYC
                    </a>
                </li>
            @endif
            @if($pp->status == 1)
                <li>
                    <a href="{{route('viewPage', $pp->slug)}}">
                        Politique de confidentialité
                    </a>
                </li>
            @endif
            @if($tos->status == 1)
                <li>
                    <a href="{{route('viewPage', $tos->slug)}}">
                        Termes et conditions
                    </a>
                </li>
            @endif
            @if($settings->payment_proof == 1)
                <li>
                    <a href="{{route('paymentProof')}}">
                        Preuve de paiement
                    </a>
                </li>
            @endif
           </ul></h6>
    </nav>
    <div class="copyright pull-right"> <a href="https://www.google.fr/chrome/?brand=CHBD&gclid=EAIaIQobChMI2I-04b3C2QIVTrHtCh1wGgCXEAAYASAAEgKY3PD_BwE" target="_blank">recommandé &nbsp;<img src="/img/google.png" alt="google"/></a> &nbsp; &nbsp; &nbsp; &nbsp; 
        &copy; {{$settings->site_name}} {{ date('Y') }}
    </div> 
</div>