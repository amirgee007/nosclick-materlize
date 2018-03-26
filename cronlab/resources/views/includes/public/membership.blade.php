

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            <h2 class="title">Abonnement "Club"</h2>
            <h5 class="description">Des gains plus importants? le choix vous appartient! Des abonnements sur mesure, afin de correspondre aux attentes de nos membres. </h5>
            <div class="section-space"></div>
        </div>
    </div>

    <div class="row">

      <div class="col-md-3 ">
            <div class="card card-pricing card-raised">
                <div class="card-content">
             
					<img src="\uploads\basic.png">
                    <h2 class="card-title text-blue"> <small>€</small>50<small>.00</small></h2>
                    <ul>
                        <li><b>70</b> publicités à visionnés</li>
                        <li>Gains à partir de <b>84€</b> /mois</li>
                        <li><b>30%</b> PPC & PPV des affiliations</li>
                        <li>Valable <b>3 mois</b></li>
                    </ul>

                    @if(Auth::guest())
                    <a href="{{route('register')}}" class="btn btn-info btn"">
                        Souscrire
                    </a>
                    @else
                        <a href="https://nosclick.com/user/memberships" class="btn btn-info btn">
                           Souscrire
                        </a>
                    @endif
                </div>
            </div>
        </div>

       <div class="col-md-3">
            <div class="card card-pricing card-raised">
                <div class="card-content">
                  
					<img src="\uploads\gold.png">
                    <h2 class="card-title text-or"> <small>€</small>100<small>.00</small></h2>
                    <ul>
                        <li><b>70</b> publicités à visionnés</li>
                        <li>Gains à partir de <b>152€</b> /mois</li>
                        <li><b>30%</b> PPC & PPV des affiliations</li>
                        <li>Valable <b>6 mois</b></li>
                    </ul>
                    @if(Auth::guest())
                        <a href="{{route('register')}}" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @else
                        <a href="https://nosclick.com/user/memberships" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @endif
                </div>
            </div>
        </div>
		
        <div class="col-md-3">
            <div class="card card-pricing card-raised">
                <div class="card-content">
                 
					<img src="\uploads\silver.png">
                    <h2 class="card-title text-silver">  <small>€</small>200<small>.00</small></h2>
                    <ul>
                        <li><b>70</b> publicités à visionnés</li>
                        <li>Gains à partir de <b>282€</b> /mois</li>
                        <li><b>30%</b> PPC & PPV des affiliations</li>
                        <li>Valable <b>1 année</b></li>
                    </ul>
                    @if(Auth::guest())
                        <a href="{{route('register')}}" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @else
                        <a href="https://nosclick.com/user/memberships" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @endif
                </div>
            </div>
        </div>
		
        <div class="col-md-3">
            <div class="card card-pricing card-raised">
                <div class="card-content">
                   
					<img src="\uploads\vip.png">
                    <h2 class="card-title text-info"><small>€</small>300<small>.00</small></h2>
                    <ul>
                        <li><b>70</b> publicités à visionnés</li>
                        <li>Gains à partir de <b>434€</b> /mois</li>
                        <li><b>30%</b> PPC & PPV des affiliations</li>
                        <li>Valable <b>1 année</b></li>
                    </ul>
                    @if(Auth::guest())
                        <a href="{{route('register')}}" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @else
                        <a href="https://nosclick.com/user/memberships" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @endif
                </div>
            </div>
        </div>
       


      <div class="col-md-3 ">
            <div class="card card-pricing card-raised">
                <div class="card-content">
             
					<img src="\uploads\life5.png">
                    <h2 class="card-title text-green"> <small>€</small>2'000<small>.00</small></h2>
                    <ul>
                        <li><b>70</b> publicités à visionnés</li>
                        <li>Gains à partir de <b>630€</b> /mois</li>
                        <li><b>30%</b> PPC & PPV des affiliations</li>
                        <li>Valable <b>5 ans</b></li>
                    </ul>

                    @if(Auth::guest())
                    <a href="{{route('register')}}" class="btn btn-info btn"">
                        Souscrire
                    </a>
                    @else
                        <a href="https://nosclick.com/user/memberships" class="btn btn-info btn">
                           Souscrire
                        </a>
                    @endif
                </div>
            </div>
        </div>

       <div class="col-md-3">
            <div class="card card-pricing card-raised">
                <div class="card-content">
                  
					<img src="\uploads\life10.png">
                    <h2 class="card-title text-green"> <small>€</small>3'000<small>.00</small></h2>
                    <ul>
                        <li><b>70</b> publicités à visionnés</li>
                        <li>Gains à partir de <b>840€</b> /mois</li>
                        <li><b>30%</b> PPC & PPV des affiliations</li>
                        <li>Valable <b>10 ans</b></li>
                    </ul>
                    @if(Auth::guest())
                        <a href="{{route('register')}}" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @else
                        <a href="https://nosclick.com/user/memberships" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @endif
                </div>
            </div>
        </div>
		
        <div class="col-md-3">
            <div class="card card-pricing card-raised">
                <div class="card-content">
                 
					<img src="\uploads\life15.png">
                    <h2 class="card-title text-green">  <small>€</small>4'000<small>.00</small></h2>
                    <ul>
                        <li><b>70</b> publicités à visionnés</li>
                        <li>Gains à partir de <b>1050€</b> /mois</li>
                        <li><b>30%</b> PPC & PPV des affiliations</li>
                        <li>Valable <b>15 ans</b></li>
                    </ul>
                    @if(Auth::guest())
                        <a href="{{route('register')}}" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @else
                        <a href="https://nosclick.com/user/memberships" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @endif
                </div>
            </div>
        </div>
		
        <div class="col-md-3">
            <div class="card card-pricing card-raised">
                <div class="card-content">
                   
					<img src="\uploads\lifevip.png">
                    <h2 class="card-title text-green"><small>€</small>5'000<small>.00</small></h2>
                    <ul>
                        <li><b>70</b> publicités à visionnés</li>
                        <li>Gains à partir de <b>1260€</b> /mois</li>
                        <li><b>30%</b> PPC & PPV des affiliations</li>
                        <li>Valable <b>à vie</b></li>
                    </ul>
                    @if(Auth::guest())
                        <a href="{{route('register')}}" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @else
                        <a href="https://nosclick.com/user/memberships" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>