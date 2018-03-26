@extends('layouts.dashboard')
@section('title', 'Mon compte')
@section('content')			
	<div class="row">
       @if(count($identity) == 0 or count($address) == 0)
       <div class="col-md-12">
           <div class="card-content">
               <div class="alert alert-info alert-with-icon" data-notify="container">
                   <i class="material-icons" data-notify="icon">notifications</i>
                   <span data-notify="message">

                                Salut {{Auth::user()->name}} , <br><br>
                                Merci d'utiliser notre service. Notre système détecte que votre identité n'a pas encore été vérifiée. Veuillez notez que vous ne pouvez pas retirer votre argent sans vérification d'identité. De plus, certaines fonctionnalités intéressantes ont été désactivées. Vérifiez votre identité dès que possible.<br>
                                <br>
                                Si vous voulez vérifier votre identité maintenant, ce sera votre bonne décision. Pour vérifier votre identité, cliquez sur le bouton <b>"Editer le profil"</b> ci-dessous. Ensuite, mettez à jour le profil avec vos informations réelles et sauvegardez. Puis cliquez sur le bouton <b>"Soumettre la vérification"</b> présent sur le côté droit, puis faire comme notre système le demande.<br><br>

                                <a href="{{route('userProfile')}}" type="button" rel="tooltip" class="btn btn-warning btn-sm">
                                    Editer le profil
                                </a>


                   </span>
               </div>
           </div>
       </div>
       @elseif(count($identity) == 1 and count($address) == 1)
	   
	  

       @endif
			
	
									
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" ><img src="/img/solde.png" style="width:50%"/>
                 
                </div>
               
				<br><br><br><br>
                <div class="card-footer">
                  
                    <h5 class="card-title pull-right">€ &nbsp; {{$user->profile->main_balance + 0}}</h5><br><br>
                    <div class="stats">
                        <i class="material-icons text-danger">account_circle</i>
                        Compte principal
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header"><img src="/img/affiliate.png" style="width:50%"/>
                   
                </div>
              
				<br><br><br><br>
                <div class="card-footer">
                    
                    <h5 class="card-title pull-right">€ &nbsp;{{$user->profile->referral_balance + 0}}</h5><br><br>
                    <div class="stats">
                        <i class="material-icons text-rose">compare_arrows</i> Compte parrainage
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" ><img src="/img/deposit.png" style="width:50%"/>
              
                </div>
              
				<br><br><br><br>
                <div class="card-footer">
                    
                     <h5 class="card-title pull-right">€ &nbsp;{{$user->profile->deposit_balance + 0}}</h5><br><br>
                    <div class="stats">
                        <i class="material-icons text-success">eject</i> Compte dépôt
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" ><img src="/img/retrait.png" style="width:50%"/>
              
                </div>
               
				<br><br><br><br>
                <div class="card-footer">
                    
                     <h5 class="card-title pull-right">€ &nbsp;{{$withdraw + 0}}</h5><br><br>
                    <div class="stats">
                        <i class="material-icons text-info">hourglass_empty</i>Total des retraits
                    </div>
                </div>
            </div>
        </div>
    </div>
  


    

   <!-- <div class="row">
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header" data-background-color="purple" data-header-animation="true">
                    <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Rafraîchir">
                            <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Modifier la date">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                    <h4 class="card-title">Statistiques des affiliations</h4>
                    <p class="category">Votre graphique de parrainage direct</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> Mis à jour il y a 1 seconde
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header" data-background-color="green" data-header-animation="true">
                    <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Rafraîchir">
                            <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Modifier la date">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                    <h4 class="card-title">Évolution des bénéfices parrainage</h4>
                    <p class="category">
                        <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> d'augmentation des clics aujourd'hui.</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> Mis à jour il y a 1 seconde
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header" data-background-color="blue" data-header-animation="true">
                    <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Rafraîchir">
                            <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Modifier la date">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                    <h4 class="card-title">L'état de vos revenus</h4>
                    <p class="category">Tableau de vos gains</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> Mis à jour il y a 1 seconde
                    </div>
                </div>
            </div>
        </div>
    </div>-->

  
	
   @if($posts)

    
    <br><br><br>
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-image" data-header-animation="false">
                    <a href="">
                        <img class="img" src="{{$post->featured}}">
                    </a>
                </div>
                <div class="card-content">
                 
                    <h4 class="card-title">
                        <div class="{{route('viewPost', ['slug'=>$post->slug])}}"> {{$post->title}}</a>
                    </h4>
                    <div class="card-description">

                        {!! Markdown::convertToHtml(str_limit($post->content,'350')) !!}

                    </div>
                </div>
                <div class="card-footer">
                   
                    <div class="stats pull-right">
                        <p class="category"> par <b>Admin</b></p>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>

    @endif



@endsection