@extends('layouts.public')

@section('title', $post->title)

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
                            <h1 class="title">Vos clicks sont importants!</h1>
                            <h4>Êtes-vous prêt à commencer à faire de l'argent en ligne avec peu d'effort? Nous sommes un site internet idéal pour les paiements sécurisés, auquel vous pouvez faire confiance. Nous avons un des meilleures systèmes et nous payons réellement! Ne perdez pas votre temps avec les sites d'escroquerie, rejoignez NOSCLICK aujourd'hui et commencez à gagner de l'argent réel maintenant!</h4>
                            <br />

                            @if (Auth::check())

                                <a href="https://nosclick.com/user/cash/links" target="_blank" class="btn btn-success btn-lg">
                                    <i class="fa fa-ticket"></i> Voir les publicités
                                </a>

                            @else


                                <a href="{{url('/register')}}" target="_self" class="btn btn-primary btn-lg">
                                    <i class="fa fa-ticket"></i> Inscrivez-vous
                                </a>


                            @endif

                        </div>

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
                        <h3 class="title">{{$post->title}}</h3>
                        <p>Published {{$post->created_at->diffForHumans()}}</p>
                        <br>

                        <div class="card card-profile card-atv">
                            <div class="card-image">
                                <a href="{{$post->featured}}">
                                    <div class="atvImg">
                                        <img class="img" src="{{$post->featured}}" />
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div>

                            {!! $post->content !!}

                        </div>

                    </div>
                </div>
            </div>
            <div class="section section-blog-info">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="blog-tags">
                                    Category:
                                    <span class="label label-primary">{{$post->category->name}}</span>
                                </div>
                            </div>

                        </div>

                        <hr />

                       

                    </div>
                </div>
            </div>
           


    <footer class="footer">


        @include('includes.public.footer')


    </footer>

    </body>

@endsection