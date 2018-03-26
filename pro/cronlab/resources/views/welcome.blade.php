@extends('layouts.public')

@section('title', 'Bienvenue à NOSCLICK')

@section('content')

    <body class="section-white">
<div class="cd-section" id="headers">
    <div class="header-3">
        <nav class="navbar navbar-info navbar-transparent navbar-fixed-top navbar-color-on-scroll">
        @include('includes.public.navbar')
        </nav>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->

            @include('includes.public.slider')

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <i class="material-icons">keyboard_arrow_left</i>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <i class="material-icons">keyboard_arrow_right</i>
                </a>
            </div>
        </div>



    </div>



    @if($settings->live_chat == 1)

        @include('includes.chat')
    @endif


    </body>

@endsection