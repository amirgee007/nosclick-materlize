<div class="container">
    <nav class="pull-left">
			 
		 
    
		<br><br><br>
	´<!--<a href="https://www.paypal.com" target="_blank"><img src="/img/paypal.png" style="width:10%"/>&nbsp; &nbsp;-->
	<a href="http://www.perfectmoney.is/?welcome=1" target="_blank"><img src="/img/perfectmoney.png" style="width:10%"/>&nbsp; &nbsp;
	<a href="https://stripe.com" target="_blank"><img src="/img/stripe.png" style="width:10%"/>&nbsp; &nbsp;
	<a href="https://www.neteller.com/fr/" target="_blank"><img src="/img/neteller.png" style="width:10%"/>&nbsp; &nbsp;
	<a href="https://www.payza.com/" target="_blank"><img src="/img/payza.png" style="width:10%"/>
	<a href="https://payeer.com/fr/" target="_blank"><img src="/img/payeer.png" style="width:10%"/>
        <ul>
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
        </ul>
    </nav><br>
    <div class="copyright pull-right"> 
        &copy; {{config('app.name')}}  {{ date('Y') }}</a>
    </div>
	<div class="copyright pull-left">
	<a href="https://www.google.fr/chrome/?brand=CHBD&gclid=EAIaIQobChMI2I-04b3C2QIVTrHtCh1wGgCXEAAYASAAEgKY3PD_BwE" target="_blank">Navigateur recommandé &nbsp;<img src="/img/google.png" alt="google"/></a>
	</div>
</div>


