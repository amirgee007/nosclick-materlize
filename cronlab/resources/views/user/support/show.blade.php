@extends('layouts.dashboard')

@section('title', 'Ticket')

@section('content')
    <div class="row">
        <h4 class="title text-center text-primary">Voir <b>"{{$support->ticket}}"</b> Numéro de ticket</h4>
        <h5 class="title text-center text-info">Sujet : <b>"{{$support->subject}}"</b></h5>
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-content">
                    <ul class="timeline">
                        <li class="timeline-inverted">
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


                        <li>
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

                                    <li class="timeline-inverted">
                                        <div class="timeline-badge">
                                            <div class="photo">
                                                <img src="{{$user->profile->avatar}}" class="img-circle" />
                                            </div>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <span class="label label-info">{{$user->name}} | Membre</span>
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

                        @if($support->status > 0)
                        <li class="timeline-inverted">
                            <div class="timeline-badge">
                                <div class="photo">
                                    <img src="{{$user->profile->avatar}}" class="img-circle" />
                                </div>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="label label-success">Soumettez votre message à l'agent de support</span>
                                </div>
                                <div class="timeline-body">

                                    <form action="{{route('userMessage.post',['ticket'=>$support->ticket])}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group label-floating">
                                            <label for="message" class="control-label">Message</label>
                                            <textarea name="body" class="form-control" id="message" rows="20"></textarea>
                                        </div>
                                        <a href="{{route('userSupports')}}" class="btn btn-rose">Annuler</a>
                                        <button type="submit" class="btn btn-success pull-right">Soumettre le message</button>
                                        <div class="clearfix"></div>

                                    </form>



                                </div>
                            </div>
                        </li>
                            @endif



                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection