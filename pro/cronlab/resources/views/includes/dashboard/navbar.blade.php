<nav class="navbar navbar-info  navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            @if(Auth::user()->admin)

            <a class="navbar-brand" href="{{ url('/admin/dashboard') }}"> Go To Admin Panel </a>

            @endif

        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{route('welcome')}}"> <i class="material-icons">home</i> Accueil </a>
                    </li>
             
                    <li><a href="{{route('userSupports')}}"> <i class="material-icons">subscriptions</i> Centre de support</a></li>
                <li><a href="{{route('contact')}}"> <i class="material-icons">live_help</i>Support pro</a></li>
                    <li>
                        <div class="dropdown">
                            <a href="#" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::user()->name }}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('userProfile')}}"> <i class="material-icons">home</i> Editer le profil </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="material-icons">https</i>
                                        Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>

            </ul>
        </div>
    </div>
</nav>