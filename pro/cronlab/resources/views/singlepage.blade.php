@extends('layouts.public')

@section('title', $page->title)

@section('content')


    <body class="section-white">
    <div class="cd-section" id="headers">
        <div class="header-1">
            <nav class="navbar navbar-info navbar-transparent navbar-fixed-top navbar-color-on-scroll">
                @include('includes.public.navbar')
            </nav>
            <div class="page-header header-filter" style="background-image: url('{{asset('img/bg12.jpg')}}');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="title">Les règles sont importantes ! </h1>
                            <h4>Notre société est très pointilleuse en ce qui concerne de respecter les règles et procédures fiscales et légales. Afin que nos clients puissent accéder à l'ensemble de nos produits en toute sécurité et légalité. Notre société est signataire de la convention AML.  Nous avons un des meilleures systèmes et nous payons réellement! Ne perdez pas votre temps avec les sites d'escroquerie, rejoignez NOSCLICK aujourd'hui et commencez à gagner de l'argent réel maintenant!</h4>
                            <br />

                     

                        @if(env('BLOG_YOUTUBE_EMBED_CODE'))

                            <div class="col-md-5 col-md-offset-1">
                                <div class="iframe-container">
                                    <iframe src="https://www.youtube.com/embed/{{env('BLOG_YOUTUBE_EMBED_CODE')}}?modestbranding=1&amp;autohide=1&amp;showinfo=0" frameborder="0" allowfullscreen height="250"></iframe>
                                </div>
                            </div>

                        @else


                        @endif


                    </div>
                </div>
            </div>

        </div>

        <!--     *********    END HEADER 3      *********      -->
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section section-text">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="title">{{$page->title}}</h3>
                        <p>Dernière mise à jour {{$page->updated_at->diffForHumans()}}</p>
                        <br>

                        {!! $page->content !!}

                    </div>
                </div>
            </div>



        </div>
    </div>


    <footer class="footer">


        @include('includes.public.footer')


    </footer>

    </body>

@endsection