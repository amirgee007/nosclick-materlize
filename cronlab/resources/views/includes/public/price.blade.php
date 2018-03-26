

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            <h2 class="title">Plan d'investissement</h2>
            <h5 class="description">Nos produits d’investissement sont entièrement automatisés, ils ne requièrent pas d'action complexe de votre part. Notre système rétribue vos bénéfices directement sur votre compte de façon autonome et sécurisé. Investir sur une période allant de 1 mois à 1 année avec un retour d'intérêt de 15% à 40%</h5>
            <div class="section-space"></div>
        </div>
    </div>

    <div class="row">

      <div class="col-md-2 ">
            <div class="card card-pricing card-raised">
                <div class="card-content">
                    <h5 class="category text-info">DUBLIN</h5>
					<img src="\uploads\dublin.png">
                    <h2 class="card-title text-info"> <small>€</small>50<small>.00</small></h2>
                    <ul>
                        <li><b>20%</b> d'intérêt</li>
                        <li>Frais et taxe inclus</li>
                        <li>Réinvestissement disponible</li>
                        <li>Capital & Intérêt disponible en 3 mois</li>
                    </ul>

                    @if(Auth::guest())
                    <a href="{{route('register')}}" class="btn btn-info btn"">
                        Souscrire
                    </a>
                    @else
                        <a href="https://nosclick.com/user/investments" class="btn btn-info btn">
                           Investir
                        </a>
                    @endif
                </div>
            </div>
        </div>

       <div class="col-md-2">
            <div class="card card-pricing card-raised">
                <div class="card-content">
                    <h5 class="category text-info">BARCELONE</h5>
					<img src="\uploads\barcelone.png">
                    <h2 class="card-title text-info"> <small>€</small>100<small>.00</small></h2>
                    <ul>
                        <li><b>30%</b> d'intérêt</li>
                        <li>Frais et taxe inclus</li>
                        <li>Réinvestissement disponible</li>
                        <li>Capital & Intérêt disponible en 3 mois</li>
                    </ul>
                    @if(Auth::guest())
                        <a href="{{route('register')}}" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @else
                        <a href="https://nosclick.com/user/investments" class="btn btn-info btn">
                            Investir
                        </a>
                    @endif
                </div>
            </div>
        </div>
		
        <div class="col-md-2">
            <div class="card card-pricing card-raised">
                <div class="card-content">
                    <h5 class="category text-info">LISBONNE</h5>
					<img src="\uploads\lisbon.png">
                    <h2 class="card-title text-info">  <small>€</small>150<small>.00</small></h2>
                    <ul>
                        <li><b>40%</b> d'intérêt</li>
                        <li>Frais et taxe inclus</li>
                        <li>Réinvestissement disponible</li>
                        <li>Capital & Intérêt disponible en 3 mois</li>
                    </ul>
                    @if(Auth::guest())
                        <a href="{{route('register')}}" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @else
                        <a href="https://nosclick.com/user/investments" class="btn btn-info btn">
                            Investir
                        </a>
                    @endif
                </div>
            </div>
        </div>
		
        <div class="col-md-2">
            <div class="card card-pricing card-raised">
                <div class="card-content">
                    <h5 class="category text-info">BERLIN</h5>
					<img src="\uploads\berlin.png">
                    <h2 class="card-title text-info"><small>€</small>200<small>.00</small></h2>
                    <ul>
                        <li><b>15%</b> d'intérêt</li>
                        <li>Frais et taxe inclus</li>
                        <li>Réinvestissement disponible</li>
                        <li>Capital & Intérêt disponible en 1 Mois</li>
                    </ul>
                    @if(Auth::guest())
                        <a href="{{route('register')}}" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @else
                        <a href="https://nosclick.com/user/investments" class="btn btn-info btn">
                            Investir
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-pricing card-raised">
                <div class="card-content">
                    <h5 class="category text-info">PARIS</h5>
					<img src="\uploads\paris.png">
                    <h2 class="card-title text-info"> <small>€</small>1'000<small>.00</small></h2>
                    <ul>
                        <li><b>25%</b> d'intérêt</li>
                        <li>Frais et taxe inclus</li>
                        <li>Réinvestissement disponible</li>
                        <li>Capital & Intérêt disponible en 6 Mois</li>
                    </ul>
                    @if(Auth::guest())
                        <a href="{{route('register')}}" class="btn btn-info btn">
                            Souscrire
                        </a>
                    @else
                        <a href="https://nosclick.com/user/investments" class="btn btn-info btn">
                            Investir
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-pricing card-raised">
                <div class="card-content">
                    <h5 class="category text-info">LONDRES</h5>
					<img src="\uploads\london.png">
                    <h2 class="card-title text-info"> <small>€</small>2'500<small>.00</small></h2>
                    <ul>
                        <li><b>35%</b> d'intérêt</li>
                        <li>Frais et taxe inclus</li>
                        <li>Réinvestissement disponible</li>
                        <li>Capital & Intérêt disponible en 1 Année</li>
                    </ul>
                    @if(Auth::guest())
                        <a href="{{route('register')}}" class="btn btn-info btn">
                            Souscire
                        </a>
                    @else
                        <a href="https://nosclick.com/user/investments" class="btn btn-info btn">
                            Investir
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>