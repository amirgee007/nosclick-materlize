@extends('layouts.public')

@section('title', 'Contact')

@section('content')
    <body>
            <nav class="navbar navbar-info navbar-transparent navbar-fixed-top navbar-color-on-scroll">
                @include('includes.public.navbar')
            </nav>

            <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('{{asset('img/bg2.jpg')}}');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="title">À propos</h1>
                            <h4>Nos services consistent à présenter à nos milliers de membres vos produits, ainsi que faire le possible que ceux-ci soient mis en valeur sur Google et Youtube, puis maintenir et augmenter le ranking sur les principaux moteurs de recherche. L'importance de la présence d'une société et notoriété sur internet n'est plus discutable en 2018 !  </h4><br>
							<h4>Rejoignez-nous maintenant est faite le pari gagnant d'augmenter votre présence et ranking sur internet rapidement et de manière efficace.  </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main main-raised">
                <div class="container">
                    <div class="section text-center">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h2 class="title">Qui sommes-nous?</h2>
                                <h5 class="description">nosclick dont l'identité juridique est Luxor Italia Srl, est une société active dans plusieurs domaines d'activité, allant de la construction à la finance depuis de nombreuses années. En 2016, Luxor Italia Srl a débuté l'ébauche d'une société internationale dont l'objectif prioritaire est d'accroitre la notoriété et la visibilité de nos clients sur internet. En utilisant une base de données contenant des milliers de membres participants.  <br> <br>

Depuis 2017, la plate-forme nosclick est disponible au grand public et permet à des milliers d'internautes de participer à l'augmentation de la visibilité de nos clients sur internet tout en augmentant le ranking de votre société sur Google et Youtube.  </h5>
                            </div>
                        </div>

                        <div class="features">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="info">
                                        <div class="icon icon-info">
                                            <i class="material-icons"><img src="/img/systems.png" /></i>
                                        </div>
                                        <h4 class="info-title">Plate-forme</h4>
                                        <p>Notre société a développé une plate-forme performante et sécurisé qui permet à nos clients de suivre en temps réel l'évolution et les résultats de chaque campagne publicitaire. Notre équipe est soucieuse de chacune des requêtes de nos clients afin de faire évoluer constamment notre plate-forme.  </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="info">
                                        <div class="icon icon-success">
                                           <i class="material-icons"><img src="/img/society.png" /></i>
                                        </div>
                                        <h4 class="info-title">Structure</h4>
                                        <p>Notre société a été créée en 2004 en Italie s'assurant une expension croissante au long des années dans différents secteurs d'activité. Ce qui renforce la force et la sécurité de notre société qui se développent aujourd'hui sur internet au travers le monde. Cette évolution nous permet aujourd'hui de garantir de fournir des produits solides à nos clients.  </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="info">
                                        <div class="icon icon-danger">
                                             <i class="material-icons"><img src="/img/certificate.png" /></i>
                                        </div>
                                        <h4 class="info-title">Légale</h4>
                                        <p>Notre société est inscrite au registre du commerce Italien depuis 2004 sous l'identité officielle de Luxor Italia Srl avec capital social de 1'00'000,00 Euros. Ces informations sont disponibles directement sur le site internet du  <a href="http://www.registroimprese.it" target=_blank >registre du commerce.</a></p>
										<p>Registre du commerce en PDF : <a href="luxoritalia.pdf" target=_blank >Luxor Italia Srl</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
				@auth
                @if(count($faqs) > 0)

                <div class="container">
                    <div class="section text-center">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h3 class="title">La réponse à votre question est peut-être dans notre FAQ </h3>
                                    </div>
                        </div>

                        <div class="features">
                            <div class="row">

                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                    @foreach($faqs as $faq)
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading{{$faq->id}}">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                                                <h4 class="panel-title">
                                                    {{$faq->title}}
                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                </h4>
                                            </a>
                                        </div>
                                        <div id="collapse{{$faq->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$faq->id}}">
                                            <div class="panel-body">
                                                {!! Markdown::convertToHtml($faq->content) !!}
                                            </div>
                                        </div>
                                    </div>

                                        @endforeach
										
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
				 @endauth
@endif





            <div class="cd-section" id="contactus">
            <div class="contactus-1 section-image" style="background-image: url('{{asset('img/city.jpg')}}')">

                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <h2 class="title">Ouverture de compte</h2>
                            <h5 class="description">Vous souhaitez ouvrir un compte professionnel. Rien de plus simple, il vous suffit de remplir le formulaire de contact. En y mentionnant vos informations de contact, incluant un résumé de vos besoins. Notre équipe entrera en contact rapidement avec vous.  </h5>
                            <div class="info info-horizontal">
                                <div class="icon icon-primary">
                                    <i class="material-icons">pin_drop</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Retrouvez-nous </h4>
									
                                    <p> Luxor Italia Srl<br>
										Via Giovanni Porzio 4<br>
                                        80143 Napoli (NA)<br>
                                        Italie
                                    </p>
                                </div>
                            </div>
                            

                        </div>
                        <div class="col-md-5 col-md-offset-2">
                            <div class="card card-contact">

                                @auth

                                    <form action="{{route('userSupport.post')}}" role="form" id="contact-form"  method="POST">

                                        {{csrf_field()}}

                                        <div class="header header-raised header-info text-center">
                                            <h4 class="card-title">Support</h4>

                                        </div>
                                        <div class="card-content">
                                            @if(count($errors) > 0)
                                                <div class="alert alert-danger alert-with-icon" data-notify="container">
                                                    <i class="material-icons" data-notify="icon">notifications</i>
                                                    <span data-notify="message">
                                                        @foreach($errors->all() as $error)
                                                            <li><strong> {{$error}} </strong></li>
                                                        @endforeach
                                                    </span>
                                                </div>
                                                <br>
                                            @endif
                                       
                                            <br>
                                            <div class="form-group label-floating">
                                                <label for="subject" class="control-label">Sujet</label>
                                                <input type="text" id="subject" name="subject" class="form-control">
                                            </div>
                                            <br>

                                            <br>
                                            <div class="form-group label-floating">
                                                <label for="message" class="control-label">Votre message</label>
                                                <textarea name="body" class="form-control" id="message" rows="20"></textarea>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary pull-right">Envoyer le message</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>


                                @endauth

                                @guest
                                        <form action="{{route('GuestEmail')}}" role="form" id="contact-form"  method="POST">

                                            {{csrf_field()}}

                                            <div class="header header-raised header-info text-center">
                                                <h4 class="card-title">Contact</h4>

                                            </div>
                                            <div class="card-content">

                                                @if (session()->has('message'))
                                                    <div class="alert alert-{!! session()->get('type')  !!}">
                                                        <span class="text-center">{!! session()->get('title')  !!}</span>
                                                        <br>
                                                        <span>{!! session()->get('message')  !!}</span>
                                                    </div>
                                                @endif



                                                @if(count($errors) > 0)
                                                    <div class="alert alert-danger alert-with-icon" data-notify="container">
                                                        <i class="material-icons" data-notify="icon">notifications</i>
                                                        <span data-notify="message">
                                                        @foreach($errors->all() as $error)
                                                                <li><strong> {{$error}} </strong></li>
                                                            @endforeach
                                                    </span>
                                                    </div>
                                                    <br>
                                                @endif
                                         
                                                <br>
                                                    <div class="form-group label-floating">
                                                        <label for="subject" class="control-label">Sujet</label>
                                                        <input type="text" id="subject" name="subject" class="form-control">
                                                    </div>
                                                <br>
                                                    <div class="form-group label-floating">
                                                        <label for="name" class="control-label">Nom</label>
                                                        <input type="text" id="name" name="name" class="form-control">
                                                    </div>
                                                <br>
                                                    <br>
                                                    <div class="form-group label-floating">
                                                        <label for="email" class="control-label">Adresse email</label>
                                                        <input type="email" id="email" name="email" class="form-control">
                                                    </div>
                                                    <br>
                                                <div class="form-group label-floating">
                                                    <label for="message" class="control-label">Votre message</label>
                                                    <textarea name="body" class="form-control" id="message" rows="20"></textarea>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary pull-right">Envoyer le message</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                @endguest


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
    <footer class="footer">


        @include('includes.public.footer')


    </footer>

            @if($settings->live_chat == 1)

                @include('includes.chat')
            @endif

    </body>

@endsection