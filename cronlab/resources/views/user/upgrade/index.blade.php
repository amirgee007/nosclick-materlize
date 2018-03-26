@extends('layouts.dashboard')
@section('title', 'Abonnement')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <h2 class="title">Abonnement</h2>
                        <h5 class="description">Des gains plus important? le choix vous appartient!</h5>
                    </div>
                </div>


                <div class="card-content">
         
                    @if($memberships)
                        @foreach($memberships as $membership)

                            <div class="col-md-3">
                                <div class="card card-pricing card-raised">
                                    <div class="card-content">
                                        <h6 class="category">{{$membership->name}}</h6>
                                           <div class="fileinput-new thumbnail">
										<div class="card-content">
                                        <img src="{{asset($membership->image)}}" alt="...">
                                    </div>
									</div>
                                        <h3 class="card-title">

                                            @if($membership->price == 0)

                                                Gratuit

                                            @else
                                                € {{$membership->price + 0}}
                                            @endif

										
                                        </h3>
										<ul>
                                       <li class="card-description">
                                            {!! $membership->details !!}
                                        </li>
										<li class="card-description">
                                            {!! $membership->details1 !!}
                                        </li>
										<li class="card-description">
                                            {!! $membership->details2 !!}
                                        </li>
										<li class="card-description">
                                            {!! $membership->details3 !!}
                                        </li>
										<li class="card-description">
                                            {!! $membership->details4 !!}
                                        </li>
										<li class="card-description">
                                            {!! $membership->details5 !!}
                                        </li>
										</ul>

                                        @if($membership->id == $user->membership_id)

                                            <span class="btn btn-warning">Abo. Actif</span>

                                        @else
                                            <a href="{{route('userMembership.upgrade', $membership->id)}}" type="button" rel="tooltip" class="btn btn-primary">
                                                Mis à jour
                                            </a>

                                        @endif


                                    </div>
                                </div>
                            </div>



                    @endforeach
                    @endif

                </div>
            </div>
        </div>



                </div>
      
     



@endsection