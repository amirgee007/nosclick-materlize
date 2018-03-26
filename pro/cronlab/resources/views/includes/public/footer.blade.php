<div class="container-fluid">
   <nav class="pull-left">
        <ul>  &nbsp; &nbsp; &nbsp; 
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

        </ul>
    </nav><br><br>
    <div class="copyright pull-right"> 
        &copy; {{config('app.name')}}  {{ date('Y') }}</a>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    </div>
</div>