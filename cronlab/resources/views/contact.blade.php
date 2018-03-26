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
                            <h4>Notre service consiste à permettre aux annonceurs d'atteindre des milliers de clients potentiels en affichant leur(s) publicité(s) sur notre site internet, tout en augmentant son ranking sur les principaux moteurs de recherche tels que Google, Bing, Yahoo, etc. Tout en permettant à nos membres de gagner de l'argent en visualisant ces publicités. </h4><br>
							<h4>Depuis 2017, il est également offert à nos membres la possibilité de souscrire à nos produits financiers, et augmenter leur capital en toute sécurité et simplicité. </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main main-raised">
                <div class="container">
                    <div class="section text-center">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h2 class="title">Parlons de nous</h2>
                                <h5 class="description">nosclick est un site internet qui permet de générer un revenu complémentaire contre quelques minutes de votre temps au quotidien, et ce de partout dans le monde. Fondé en début d'année 2017, nosclick a depuis revu son modèle économique, et devenu l'un des principaux leaders du secteur en offrant à ses membres la possibilité de gagner de l'argent de différentes formes. <br> <br>

 Il est aujourd'hui possible d'avoir un revenu supplémentaire en utilisant notre système de rétribution publicitaire, de recevoir des bonus supplémentaires avec notre programme d'affiliation, ou encore souscrire à nos produits financiers et recevoir des intérêts avantageux. </h5>
                            </div>
                        </div>

                        <div class="features">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="info">
                                        <div class="icon icon-info">
                                            <i class="material-icons"><img src="/img/systems.png" /></i>
                                        </div>
                                        <h4 class="info-title">À propos du système</h4>
                                        <p>Nous avons créé une plate-forme qui aidera nos clients à obtenir des fonds pour soutenir leur projet, que ce soit pour rénover votre maison, des frais médicaux imprévus, obtenir des fonds pour un projet spécial qui vous tient à cœur, ou toute autre cause. </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="info">
                                        <div class="icon icon-success">
                                           <i class="material-icons"><img src="/img/society.png" /></i>
                                        </div>
                                        <h4 class="info-title">Société solide</h4>
                                        <p>nosclick devient de jour en jour plus fort et développé en gagnant la renommée publique. Puis en 2017, le conseil d'administration de Lexor Italia Srl à décidé de créer cette nouvelle plate-forme nosclick accessible de partout dans le monde via Internet ! Jamais auparavant le processus d'investissement n'a été aussi simple et rentable ! </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="info">
                                        <div class="icon icon-danger">
                                             <i class="material-icons"><img src="/img/certificate.png" /></i>
                                        </div>
                                        <h4 class="info-title">Information légale</h4>
                                        <p>Luxor Italia Srl est une société fondée en 2004 et inscrite officiellement au registre du commerce en Italie. Il est possible de vérifier à tout moment si la société est légitime sur le site internet du  <a href="http://www.registroimprese.it" target=_blank >registre du commerce .</a></p>
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
                            <h2 class="title">Entrer en contact</h2>
                            <h5 class="description">Notre équipe du support travaille 24h/24 et 7j/7 afin de vous fournir le meilleur support possible. Nous essaierons de répondre à vos questions dès que possible. Notre équipe sera toujours là pour vous aider durant notre collaboration. </h5>
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