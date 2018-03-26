@extends('layouts.dashboard')
@section('title', 'News')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">new_releases</i>
                </div>
				  <br>
                  <h4 class="card-title">News & Update</h4>

                 				 <div class="col-md-12">
				 <div class="pull-right"> Rejoignez notre groupe officiel <a href="https://www.facebook.com/groups/2001188593428270/?hc_ref=ARQ6lAFpiz7wSEPDxPt_WXpSdAL2Qz9fCVRuGr0sDdrVjd1lDaGWi2GsK0fSScTXWE0" target="_blank">&nbsp;<br><img src="/img/face1.png" style="width:80%" alt="google"/></a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div><br><br>
           <div class="card-content">
               <div class="alert alert-info alert-with-icon" data-notify="container">
                   <i class="material-icons" data-notify="icon">notifications</i>
                   <span data-notify="message">  <br>

                                Bonjour {{Auth::user()->name}} , <br><br>

							   Suite à un rapport de notre département Fraud & Risk, parvenu à notre direction. Nous avons identifié la création de milliers de comptes avec de fausses informations, afin de profiter chacun des 2€ offerts par l'affiliation et les reverser sur leur compte principal, via notre système de « transfert de fonds ».  Notre département Risk & Fraud à identifié également des centaines de personnes qui ont utilisé ces fonds pour acquérir des « abonnements » ou encore investir dans nos produits d'investissements.
                                <br><br>
                                Aujourd'hui, lors de la création d'un nouveau compte, aucun abonnement ne vous est attribué. Vous pouvez visionner nos publicités, mais aucune rémunération n'est reversée sur votre compte.
                                 <br><br>
                                La décision de notre Direction est sans appel, nous retirons avec effet immédiat le Bonus de 2€ reçu par l'affiliation d'un nouveau membre via les liens de parrainages. Notre département marketing étudie en ce moment même une solution qui viendra remplacer ces Bonus,  cependant de façon sécurisée.
                                 <br><br>
                                Notre Direction, a également pris l'initiative d'interdire l'utilisation et l'inscription des membres des Pays suivants :  Cameroun, Côte d'Ivoire, Bénin, Guinée-Bissau, Togo, Guinée-Conakry, Sénégal, Ghana, Nigeria, Gabon, Sénégal, Gambie. Les comptes déjà existant des utilisateurs de ces Pays seront supprimés de nos bases de données.
                                 <br><br>
                                 Toute les vérifications d'identités ont été annulés par la même occasion, ceci dû à des fraudes sur notre système de vérification. Nous vous serions grée de soumettre à nouveau vos documents pour la vérification de votre compte.
                                 <br><br>
                                 Notre département technique va également mettre en place dans les prochains jours, un système d'authentification en deux étapes. Afin de garantir une sécurité accrue lors de la connexion au compte membre.
                                 <br><br>
                                 Ces mesures ont été prises à des fins de sécuriser au maximum notre site internet, et ainsi garantir des produits de qualité à nos membres, clients et partenaires.
                                 <br><br>

								20 mars 2018

                    <br>


                   </span>
               </div>
           </div>
       </div>

				 <div class="col-md-12">
           <div class="card-content">
               <div class="alert alert-info alert-with-icon" data-notify="container">
                   <i class="material-icons" data-notify="icon">notifications</i>
                   <span data-notify="message">  <br>

                                Bonjour {{Auth::user()->name}} , <br><br>

							   Suite à de nombreuses tentatives de fraudes, autant par la création de faux compte, que par d'autres moyens.  Notre direction à décider de mettre en terme à l'abonnement « FREE », avec les avantages que celui-ci présentait.
                                <br><br>
                                Aujourd'hui, lors de la création d'un nouveau compte, aucun abonnement ne vous est attribué. Vous pouvez visionner nos publicités, mais aucune rémunération n'est reversée sur votre compte.
                                 <br><br>
                                Vous avez le choix entre 8 abonnements différents, qui ont été réfléchi et pensé afin de correspondre aux mieux aux attentes de nos membres. Dont la gamme « LIFE » qui correspond parfaitement aux membres qui souhaitent profiter de notre collaboration pour de nombreuses années.
                                 <br><br>
                                Notre direction à cependant augmenter le pourcentage des affiliations, qui jusqu'à présent était de 10%. Une augmentation de 20% à été effectué, ce qui vous permet de recevoir 30% sur les affiliations.
                                 <br><br>
								20 mars 2018

                    <br>


                   </span>
               </div>
           </div>
       </div>
        	 <div class="col-md-12">
        <div class="card-content">
               <div class="alert alert-info alert-with-icon" data-notify="container">
                   <i class="material-icons" data-notify="icon">notifications</i>
                   <span data-notify="message">   <br>

                                Bonjour {{Auth::user()->name}} , <br><br>

                                Ici seront disponibles toutes les nouveautés concernant notre société. Afin de révolutionner la newsletter, qui finit bien trop souvent dans le SPAM des boîtes emails,  nous avons décidé de ne transmettre aucune
                                 newsletter, et simplement affichent ici les nouveautés et informations essentielles sur notre société.
                                <br><br>
								19 mars 2018


                        <br>

                   </span>
               </div>
           </div>
       </div>

           


               </div>
            </div>
              </div>


@endsection