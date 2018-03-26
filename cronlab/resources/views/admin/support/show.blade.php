@extends('layouts.admin')

@section('title', 'Afficher la discussion sur les tickets du support')

@section('content')
    <div class="row">
        <h4 class="title text-center text-primary">Vue <b>"{{$support->ticket}}"</b> Numéro de Ticket</h4>
        <h5 class="title text-center text-info">Sujet : <b>"{{$support->subject}}"</b></h5>
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-content">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge">
                                <div class="photo">
                                    <img src="{{$support->user->profile->avatar}}" class="img-circle" />
                                </div>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="label label-info">{{$support->user->name}} | Membre</span>
                                </div>
                                <div class="timeline-body">
                                    <p>{!! Markdown::convertToHtml($support->message) !!}</p>
                                </div>
                                <h6>
                                    <i class="ti-time"></i> {{$support->created_at->diffForHumans()}}
                                </h6>
                            </div>
                        </li>

                        @foreach( $discussions as $discussion)

                            @if($discussion->type == 1)
                                <li class="timeline-inverted">
                                    <div class="timeline-badge">
                                        <div class="photo">
                                            <img src="{{$discussion->user->profile->avatar}}" class="img-circle" />
                                        </div>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-success">{{$discussion->user->name}} | Agent du support</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{!! Markdown::convertToHtml($discussion->message) !!}</p>
                                        </div>
                                    </div>
                                </li>

                            @elseif($discussion->type == 0)

                                <li>
                                    <div class="timeline-badge">
                                        <div class="photo">
                                            <img src="{{$discussion->user->profile->avatar}}" class="img-circle" />
                                        </div>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-info">{{$discussion->user->name}} | Membre</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{!! Markdown::convertToHtml($discussion->message) !!}</p>
                                        </div>
                                        <h6>
                                            <i class="ti-time"></i> {{$discussion->created_at->diffForHumans()}}
                                        </h6>
                                    </div>
                                </li>

                            @endif



                        @endforeach

                        <li  class="timeline-inverted">
                            <div class="timeline-badge">
                                <div class="photo">
                                    <img src="{{$user->profile->avatar}}" class="img-circle" />
                                </div>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="label label-success">Envoyer votre message</span>
                                </div>
                                <div class="timeline-body">

                                    <form action="{{route('adminSupport.post',['ticket'=>$support->ticket])}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group label-floating">
                                            <label for="message" class="control-label">Message</label>
                                            <textarea name="body" class="form-control" id="message" rows="20"></textarea>
                                        </div>
                                        <a href="{{route('adminSupports.open')}}" class="btn btn-rose">Annuler</a>
                                        <button type="submit" class="btn btn-success pull-right">Soumettre</button>
                                        <div class="clearfix"></div>

                                    </form>



                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection