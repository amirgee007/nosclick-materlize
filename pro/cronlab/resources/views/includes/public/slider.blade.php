<!--     *********     HEADER 3      *********      -->
<div class="carousel-inner">
    <div class="item active">
        <div class="page-header header-filter" style="background-image: url('{{asset('img/dg1.jpg')}}');">

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-left">
					<h1 class="title"><img src="/img/nosclick1.png" /></h1>
                        <h4>Augmenter la visibilité de votre société ainsi que celle de vos produits. Tout en faisant accroître le ranking de votre site internet sur Google et Youtube en l'espace de quelques jours !   </h4>
					
						<h4>Obtenez des milliers de visualisations chaque jour et des répércutions répercussions importantes sur les réseaux sociaux. Rejoignez les centaines de clients qui nous font déjà confiance. </h4>
                        <br />

                        <div class="buttons">

                            @if(Auth::guest())

                            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                                Augmenter votre visibilité
                            </a>

                            @else

                            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                                Augmenter votre visibilité
                            </a>

                            @endif


                          
                          
                       
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="item">
        <div class="page-header header-filter" style="background-image: url('{{asset('img/dg2.jpg')}}');">

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-left">
                        <h1 class="title">Une visibilité absolue sur Google et Youtube !</h1>
                        <h4>Une équipe d'experts analyse dans les moindres détails les besoins de nos clients. Que nous puissions trouver la solution la plus adéquate et correspondant aux exigences les plus accrues de notre clientèle. </h4>
						<h4>Nos produits ne cessent d'évoluer avec les demandes les plus variés de nos nombreux clients. Chez nosclick ce sont les produits qui s'adaptent à nos clients, et non les clients qui s'adaptent à nos produits !  </h4>
                        <br />
                        <h6>Suivez-nous sur :</h6>
                        <div class="buttons">
                           
                          <a href="https://www.facebook.com/Nosclick-345259489283916/" target="_blank" class="btn btn-just-icon btn-simple"><img src="/img/facebook.png"  />
                                    <i class=""></i>
                            </a>
                       
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="item">
        <div class="page-header header-filter" style="background-image: url('{{asset('img/dg3.jpg')}}');">

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-left">
                        <h1 class="title">Contrôle des coûts marketing</h1>
                        <h4>Nous développons constamment des outils permettant à nos clients de suivre en temps réel l'évolution des campagnes marketing et publicitaires de nos clients.  </h4>
						<h4>Nos clients conservent ainsi un contrôle minutieux des dépenses marketing et publicitaires. Nos outils fournissent des détails complets sur les dépenses en temps réel, permettant de respecter le budget markerting au centime. </h4>
                        <h4>Notre société est signataire des règlements AML & KYC internationale. Qui permet à nos clients de profiter de nos produits dans le plus grand respect des exigences fiscales et légales. </h4>
						<br />

                       

                           

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>