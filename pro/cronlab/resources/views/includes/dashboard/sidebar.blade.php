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
    </div>
    <ul class="nav">
        <li class="{{ Request::is('user/dashboard') ? "active" :"" }}">
            <a href="{{route('userDashboard')}}">
                <i class="material-icons">dashboard</i>
                <p>Compte</p>
            </a>
        </li>
		
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
                <i class="material-icons">local_atm</i>
                <p>Dépôt
                </p>
            </a>
        </li>

      
        <li class="{{ Request::is('user/deposit') ? "active" :"" }}">
            <a href="{{route('userDeposits')}}">
                <i class="material-icons">attach_money</i>
                <p>Historique des dépôts
                </p>
            </a>
        </li>

       
    </ul>
</div>