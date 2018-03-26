
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <h2 class="title">Gagner de l'argent avec vos amis!</h2>
            <h5 class="description">Vous pouvez bénéficier de notre programme de parrainage et recevoir des gains journaliers, jusqu'à 10% de vos affiliés, ainsi que divers bonus en invitant vos amis à nous rejoindre ! </h5>
            <div class="section-space"></div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-5 col-md-offset-1">
               <div class="card card-pricing card-raised">
        <div class="card-content">
         <a href="#"><img src="/img/affiliate1.png" /></a>
             
            <!-- <div class="card-content">
                    <label class="label label-rose">Parrainage</label>
                    <a href="#">
                        <h3 class="card-title">Affiliation de succès</h3>
                    </a>
                    <p class="card-description">
                       Nous avons du succès grâce à nos clients et partenaires affiliés. Nous n'oublions pas cela, et nous voulons vous dire merci en fournissant le meilleur programme de fidélisation avec un taux de paiement des plus élevés du secteur!
                    </p>-->
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="info info-horizontal">
                <div class="icon icon-info">
                    <i class="material-icons">account_balance_wallet</i>
                </div>
                <div class="description">
                    <h4 class="info-title">Programme d'affiliation </h4>
                    <p class="description">
                       Notre programme d'affiliation est tellement attractif et payant, que ce serait une grosse perte de ne pas l'utiliser ! Vous pouvez créer un supplément de revenu stable à long terme sur Internet. 
                    </p>
                </div>
            </div>

            <div class="info info-horizontal">
                <div class="icon icon-primary">
                    <i class="material-icons">card_giftcard</i>
                </div>
                <div class="description">
                    <h4 class="info-title">Rétribution publicitaire</h4>
                    <p class="description">
                        Tous ceux qui participent à notre programme seront payés tous les jours, 7 jours par semaine  et 365 jours par année! Un abonnement gratuit d'un mois est offert à tous les nouveaux membres. 
                    </p>
                </div>
            </div>

            <div class="info info-horizontal">
                <div class="icon icon-primary">
                    <i class="material-icons">build</i>
                </div>
                <div class="description">
                    <h4 class="info-title">Outils de promotion</h4>
                    <p class="description">
                        Des outils promotionnels efficaces sont mis à disposition de nos membres, qui permettent de promouvoir nos produits sur les réseaux sociaux et recevoir des gains supplémentaires. 
                    </p>
                </div>
            </div>
        </div>

    </div>

</div>

<!--<hr>
@if($settings->latest_deposit == 1)
<div class="container">
        <!--                nav tabs	             -->
       <!-- <div id="nav-tabs">

            <div class="row">
                <div class="col-md-6">

                    <!-- Tabs with icons on Card -->
                  <!--  <div class="card card-nav-tabs">
                        <div class="header header-info">
                            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                            <!--<div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="pull-center nav nav-tabs" data-tabs="tabs">
                                        <li class="active">
                                            <a href="#deposit" data-toggle="tab">
                                                <i class="material-icons">flight_land</i>
                                                Derniers dépôts
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="tab-content text-center">
                                <div class="tab-pane active" id="deposit">

                                    @if(count($deposits) > 0)
                                        <div class="table-responsive">

                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th class="text-center"></th>
                                                    <th class="text-center">Processeur</th>
                                                    <th class="text-center">Montant</th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center">Statut</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $id=0;@endphp
                                                @foreach($deposits as $deposit)
                                                    @php $id++;@endphp
                                                    <tr>
                                                        <td class="text-center">{{ $id }}</td>
                                                        <td class="text-center">{{$deposit->gateway_name}}</td>
                                                        <td class="text-center">€ {{$deposit->amount}}</td>
                                                        <td class="text-center">{{$deposit->created_at->diffForHumans()}}</td>

                                                        <td class="actions text-center">
                                                            @if($deposit->status == 1)
                                                                <button class="btn btn-success btn-sm">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>
                                                                    Ok
                                                                </button>
                                                            @else

                                                                <button class="btn btn btn-sm">
                                        <span class="btn-label">
                                            <i class="material-icons">autorenew</i>
                                        </span>
                                                                    En traitement
                                                                </button>



                                                            @endif






                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                    @else

                                        <h4 class="text-center">Aucun dépôt</h4>
                                    @endif



                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Tabs with icons on Card -->

               <!-- </div>

                <div class="col-md-6">

                    <!-- Tabs with icons on Card -->
                    <!--<div class="card card-nav-tabs">
                        <div class="header header-info">
                            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                            <!--<div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="pull-center nav nav-tabs" data-tabs="tabs">
                                        <li class="active">
                                            <a href="#deposit" data-toggle="tab">
                                                <i class="material-icons">flight_takeoff</i>
                                                Derniers retraits
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="tab-content text-center">
                                <div class="tab-pane active" id="deposit">

                                    @if(count($withdraws) > 0)
                                        <div class="table-responsive">

                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th class="text-center"></th>
                                                    <th class="text-center">Processeur</th>
                                                    <th class="text-center">Montant</th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center">Statut</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $id=0;@endphp
                                                @foreach($withdraws as $withdraw)
                                                    @php $id++;@endphp
                                                    <tr>
                                                        <td class="text-center">{{ $id }}</td>
                                                        <td class="text-center">{{$withdraw->gateway_name}}</td>
                                                        <td class="text-center">€ {{$withdraw->amount}}</td>
                                                        <td class="text-center">{{$withdraw->updated_at->diffForHumans()}}</td>

                                                        <td class="actions text-center">
                                                            @if($withdraw->status == 1)
                                                                <button class="btn btn-success btn-sm">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>
                                                                    Ok
                                                                </button>
                                                            @else

                                                                <button class="btn btn btn-sm">
                                        <span class="btn-label">
                                            <i class="material-icons">autorenew</i>
                                        </span>
                                                                    En traitement
                                                                </button>



                                                            @endif






                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                    @else

                                        <h4 class="text-center">Aucun retrait</h4>
                                    @endif



                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Tabs with icons on Card -->

                <!--</div>

            </div>
        </div>
</div>
<hr>-->
@endif
<br><br><br>
<div class="cd-section" id="pricing">
    <!--     *********    PRICING 3     *********      -->

    <div class="pricing-3 section-image" style="background-image: url('{{asset('img/city.jpg')}}');" id="pricing-3">

        @include('includes.public.price')

    </div>

    <!--     *********    END PRICING 3      *********      -->
</div>
<br><br><br>

<div class="container">
<div class="row">

    <div class="col-md-5 col-md-offset-1">
        <div class="info info-horizontal">
            <div class="icon icon-primary">
                <i class="material-icons">credit_card</i>
            </div>
            <div class="description">
                <h4 class="info-title">Retrait</h4>
                <p class="description">
                   Chaque retrait sera traité dans les 24 à 72h selon le montant de votre retrait. Ceci en conformité avec les règles KYC & AML dont nous sommes signataires. 
                </p>
            </div>
        </div>

        <div class="info info-horizontal">
            <div class="icon icon-primary">
                <i class="material-icons">send</i>
            </div>
            <div class="description">
                <h4 class="info-title">Condition de retrait</h4>
                <p class="description">
                    Tout membre peut retirer ses bénéfices à tout moment, dans la condition d'avoir accumulé plus de €100,00 sur son compte de dépôt. Mais ne peut retirer son investissement initial qu'après 30 jours. 
                </p>
            </div>
        </div>

        <div class="info info-horizontal">
            <div class="icon icon-info">
                <i class="material-icons">business</i>
            </div>
            <div class="description">
                <h4 class="info-title">Retrait d'urgence</h4>
                <p class="description">
                   Vous avez besoin d'un retrait d'urgence ? Il est possible de retirer votre argent à tout moment . Toutefois il sera retenu des frais de 20% sur votre investissement. Car votre capital est investi chez nos partenaires. 
                </p>
            </div>
        </div>
    </div>
<br><br>

    <div class="col-md-5">
        <div class="card card-pricing card-raised">
        <div class="card-content">
         <a href="#"><img src="/img/banking.png" /></a>
		 
            </div>
        </div>
    </div>

	
		 
        
           <!-- <div class="card-content">
                <label class="label label-rose">Avantages</label>
                <a href="#">
                    <h2 class="card-title">Avantages membres</h2>
                </a>
                <p class="card-description">
                    Gagnez de l'argent avec le programme de rétribution des gains publicitaires! Nous reversons jusqu'à 60% nos gains nets à nos membres.
                </p>
            </div>-->
        </div>
    </div>
</div>
</div>

