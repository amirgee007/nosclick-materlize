<!--     *********     HEADER 3      *********      -->
<div class="carousel-inner">
    <div class="item active">
        <div class="page-header header-filter" style="background-image: url('{{asset('img/dg1.jpg')}}');">

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-left">
                        <h1 class="title"><img src="/img/nosclick1.png" /></h1>
                        <h4>Notre société publicitaire/d'investissement est basée en Italie. Nous prétendons être la référence dans notre secteur d'activité durant l'année 2018! Autant par l'excellence de nos produits que par le remerciement de nos clients et partenaires. <br><br>
						Nos services sont accessibles de partout dans le monde, notre site internet sera bientôt disponible dans les principales langues mondiales. </h4>
						<!--<img src="/img/en.png" />&nbsp; &nbsp; &nbsp; <img src="/img/es.png" /> &nbsp; &nbsp; &nbsp; <img src="/img/de.png" />&nbsp; &nbsp; &nbsp;  <img src="/img/it.png" />-->
				
						<br><br>	
                        <div class="buttons">

                            @if(Auth::guest())

                            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                                S'inscrire
                            </a>

                            @else

                                <a href="https://nosclick.com/user/cash/links" class="btn btn-info btn-lg">
                                   Voir les publicités
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
                        <h1 class="title">Revenu élevé à faible risque</h1>
                        <h4>Un moyen simple et abordable d'augmenter vos revenus mensuels en investissant de petite somme d'argent. Nos divers produits d'investissements s'adapte au mieux à vos besoins. Le bénéfice ainsi que le capital initial est rétribué à échéance de chaque période d'investissement.  </h4>
                        <br />
                        <h6>Suivez-nous sur:</h6>
                        <div class="buttons">
                           
                            <a href="https://www.facebook.com/Nosclick-345259489283916/" target="_blank" class="btn btn-just-icon btn-simple"><img src="/img/facebook.png"  />
                                    <i class=""></i>
                            </a>
                         
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
                        <h1 class="title">Le parrainage facile</h1>
                        <h4>Vous pouvez recevoir des gains supplémentaires sur notre site internet en utilisant notre programme de parrainage. Pour chaque utilisateur inscrit sous votre lien de parrainage, vous recevez un bonus d'inscription ainsi que 30% de l'ensemble de son chiffre d'affaires.  </h4>
                        <br />

                       
					   <div class="buttons">
                            <a href="#" class="btn btn-white btn-simple btn-lg">
                                <i class="material-icons">share</i> Pargager l'offre
                            </a>
							

                            @if(Auth::guest())
                            <a href="{{ route('login') }}" class="btn btn-info btn-lg">
                                <i class="material-icons">account_box</i> Connectez-vous
                            </a>
                            @else
                                <a href="https://nosclick.com/user/referrals" class="btn btn-info btn-lg">
                                    <i class="material-icons">account_box</i> Mes parrainages
                                </a>
                            @endif

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

