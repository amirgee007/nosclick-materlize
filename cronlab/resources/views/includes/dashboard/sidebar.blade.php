<!--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
<div class="logo">
    <a href="https://nosclick.com/" class="simple-text">
         <img src="/img/logo1.png"  />
    </a>
</div>
<div class="logo logo-mini">
    <a href="#" class="simple-text">
        {{config('app.name')}}
    </a>
</div>
<div class="sidebar-wrapper">
    <div class="user">
        <div class="photo">
            <img src="{{asset(Auth::user()->profile->avatar)}}" />
        </div>
        <div class="info">
            <a data-toggle="collapse" href="#UserColl" class="collapsed">
                {{ Auth::user()->name }}
                <b class="caret"></b>
            </a>
            <div class="collapse" id="UserColl">
                <ul class="nav">
                    <li>
                        <a href="{{route('userProfile')}}">Editer le profil</a>
                    </li>
                </ul>

            </div>
        </div>
	
	
	            <center> 
	            <!--<span class="control-label">  Vérification d'identité </span></center>-->
	            
                        @if(@$result1)
                            @if($result1->status == false)
                           <center> <span class="btn btn-warning btn-sm">En cours de vérification</span></center>
                            @else
                            <center><span class="btn btn-success btn-sm">Vérifié</span></center>
                            @endif
                        @else
                        <center> <span class="btn btn-danger btn-sm">Non vérifié</span></center>
                        @endif
                         
                       
        
       <a href="#">
              <i class="material-icons"></i>
              <!--<h4> <b>  {{(Auth::user()->active ? 'Activated' : 'Not Activated')}}</b></h4> -->
              
             <!-- <h5> <b>Membre :</b>  <img src="{{asset(Auth::user()->membership->image1)}}" /></h5>-->
				<h5> <b>Membre :</b>  {{(Auth::user()->member_name)}}</h5>
			   <h8> <b>Valable jusqu'au :</b>  {{ Auth::user()->membership_expired }}</h8>

            </a>

		 
    </div>
	
    <ul class="nav">
	

        <li class="{{ Request::is('user/dashboard') ? "active" :"" }}">
            <a href="{{route('userDashboard')}}">
              <i class="material-icons">account_box</i>
                <p>Mon compte</p>
            </a>
        </li>

         <li class="{{ Request::is('user/news') ? "active" :"" }}">
            <a href="{{route('userNews')}}">
                <i class="material-icons">new_releases</i>
                <p>News
                </p>
            </a>
        </li>

        @if($settings->ptc == 1)

        <li class=" {{ Request::is('user/cash/links') ? "active" :"" }}">
            <a href="{{route('userCash.links')}}">
               <i class="material-icons">link</i>
                <p>Liens PPC
                </p>
            </a>
        </li>

        @endif

        @if($settings->ppv == 1)

        <li class=" {{ Request::is('user/cash/videos') ? "active" :"" }}">
            <a href="{{route('userCash.videos')}}">
                <i class="material-icons">play_arrow</i>
                <p>Vidéos PPV
                </p>
            </a>
        </li>
        @endif
        @if($settings->invest == 1)

        <li class="{{ Request::is('user/investments') ? "active" :"" }}">
            <a href="{{route('userInvestments')}}">
                <i class="material-icons">insert_chart</i>
                <p>Investissement
                </p>
            </a>
        </li>
        @endif

        @if($settings->membership_upgrade == 1)
        <li class="{{ Request::is('user/memberships') ? "active" :"" }}">
            <a href="{{route('userMemberships')}}">
                <i class="material-icons">card_membership</i>
                <p>Abonnement
                </p>
            </a>
        </li>
        @endif
		
        <li class="{{ Request::is('user/deposit/create') ? "active" :"" }}">
            <a href="{{route('userDeposit.create')}}">
                <i class="material-icons">attach_money</i>
                <p>Dépôt d'argent
                </p>
            </a>
        </li>
		
        
        <li class="{{ Request::is('user/withdraw/create') ? "active" :"" }}">
            <a href="{{route('userWithdraw.create')}}">
                <i class="material-icons">money_off</i>
                <p>Retrait d'argent
                </p>
            </a>
        </li>
        
		
        <li class="{{ Request::is('user/referrals') ? "active" :"" }}">
            <a href="{{route('userReferrals')}}">
                <i class="material-icons">supervisor_account</i>
                <p>Mes parrainages

                </p>
            </a>
        </li>

        <li class="{{ Request::is('user/balance-transfer') ? "active" :"" }}">
            <a href="{{route('userFundsTransfer')}}">
                <i class="material-icons">transfer_within_a_station</i>
                <p>Transfert de fonds</p>
            </a>
        </li>
        @if($settings->invest == 1)

        <li class="{{ Request::is('user/investments/history') ? "active" :"" }}">
            <a href="{{route('userInvest.history')}}">
                <i class="material-icons">equalizer</i>
                <p>Mes investissements
                </p>
            </a>
        </li>
        @endif
        @if($settings->invest == 1)
        <li class="{{ Request::is('user/interests/history') ? "active" :"" }}">
            <a href="{{route('userInterest.history')}}">
                <i class="material-icons">device_hub</i>
                <p>Historique des intérêts
                </p>
            </a>
        </li>
        @endif
        <li class="{{ Request::is('user/deposit') ? "active" :"" }}">
            <a href="{{route('userDeposits')}}">
                <i class="material-icons">monetization_on</i>
                <p>Historique des dépôts
                </p>
            </a>
        </li>
        
        <li class="{{ Request::is('user/withdraw') ? "active" :"" }}">
            <a href="{{route('userWithdraws')}}">
                <i class="material-icons">get_app</i>
                <p>Historique des retraits
                </p>
            </a>
        </li>
        <li class="{{ Request::is('user/earning/history') ? "active" :"" }}">
            <a href="{{route('userEarns')}}">
                <i class="material-icons">card_travel</i>
                <p>Historique de vos gains
                </p>
            </a>
			<br>
        </li>

                <li class="">
                        <a href="https://www.facebook.com/nosclick/" target="_blank">
                            <i class="material-icons"></i>
                                Suivez-nous <img src="/img/facebook10.png" style="width:80%" alt="facebook"/>
                        </a>
                </li>
<br>
    </ul>
</div>