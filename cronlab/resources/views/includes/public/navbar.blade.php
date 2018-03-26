
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{config('app.url')}}"><img src="/img/logo.png"  title="NOSCLICK" alt="NOSCLICK" /></a>
        </div>

        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right">

                @if (Auth::guest())
					
					<li><a href="https://pro.nosclick.com"> <i class="material-icons">work</i> nosclick pro</a></li>
                    <li><a href="{{ url('/contact-us') }}"> <i class="material-icons">contact_mail</i> Contact</a></li>
                    <li><a href="{{ route('login') }}"> <i class="material-icons">fingerprint</i> S'identifier</a></li>
                    <li><a href="{{ route('register') }}"><i class="material-icons">subscriptions</i> S'inscrire</a></li>
                @else
                   
                    <li><a href="{{ url('/contact-us') }}"> <i class="material-icons">contact_mail</i> Contact</a></li>
                    <li>
                        <a href="{{ url('/user/dashboard') }}"> <i class="material-icons">account_box</i> Mon compte </a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <a href="#" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::user()->name }}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">

                                <li>
                                    <a href="{{ route('userProfile') }}"> <i class="material-icons">mode_edit</i> Editer le profil </a>
                                </li>

                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="material-icons">power_settings_new</i>
                                        Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

            </ul>

        </div>
    </div>
