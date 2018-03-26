@extends('layouts.dashboard')
@section('title', 'Investissement')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <h2 class="title">Investissement</h2>
                        <h5 class="description">Un taux d'intérêt et une durée total sur mesure!</h5>
                    </div>
                </div>


                <div class="card-content">
                    <br>
                    @if($invests)
                        @foreach($invests as $invest)

                            <div class="col-md-4">
                                <div class="card card-pricing card-raised">
                                    <div class="card-content">
                                        <h6 class="category">{{$invest->name}}</h6>
                                        <div class="fileinput-new thumbnail">
										<div class="card-content">
                                        <img src="{{asset($invest->image)}}" alt="...">
                                    </div>
									</div>
										
                                        <h5 class="card-title text-warning">
                                               <b>de €{{$invest->minimum + 0}} à €{{$invest->maximum + 0}}</b>
                                        </h5>
                                        <br>
										<ul>
                                        <li class="card-description">
                                            Retour garanti de<span class="text-success">  {{$invest->percentage + 0}}% </span> sur chaque investissements sur le plan <span class="text-success">  {{$invest->style->name}}</span> </li>
                                           <li> Les intérêts sont rétribués en<span class="text-success"> {{$invest->repeat}} </span>x </li> <li> Le calcul commence

                                            @if($invest->start_duration == 0)

                                                <span class="text-success"> <li>immédiatement</li></span>

                                            @else
                                                                <span class="text-success">  {{$invest->start_duration}} </span> heures plus tard, afin que notre système Anti-Fraude valide votre investissement. </li> 
															<li class="card-description">
                                            {!! $invest->details5 !!}
                                        </li></ul>
                                            @endif


                                           
                                        </p>
                                        <button class="btn btn-raised btn-round btn-info" data-toggle="modal" data-target="#investModal{{$invest->id}}">
                                            Investir maintenant
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- small modal -->
                            <div class="modal fade" id="investModal{{$invest->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-small ">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5>Entrer le montant de l'investissement ci-dessous</h5>
                                        </div>
                                        <form action="{{route('userInvestment.submit')}}" method="post">
                                            {{ csrf_field() }}
                                            @if(count($errors) > 0)
                                                <div class="alert alert-danger alert-with-icon" data-notify="container">
                                                    <i class="material-icons" data-notify="icon">notifications</i>
                                                    <span data-notify="message">
                                                        @foreach($errors->all() as $error)
                                                            <li><strong> {{$error}} </strong></li>
                                                        @endforeach
                                                    </span>
                                                </div>
                                            @endif

                                            <div class="modal-body">
                                                    <div class="form-group label-floating">
                                                        <label  class="control-label" for="amount">Montant</label>
                                                        <input id="amount" name="amount" type="number" class="form-control">
                                                    </div>

                                                <input type="hidden" name="plan_id" value="{{$invest->id}}">

                                            </div>

                                        <div class="modal-footer text-center">
                                            <button type="button" class="btn btn-simple" data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-success btn-sm">Aperçu de l'investissement</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--    end small modal -->

                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>




@endsection