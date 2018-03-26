@extends('layouts.admin')

@section('title', 'Créer un plan investissement')

@section('styles')


@endsection


@section('content')

    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Plan d'investissement -
                        <small class="category">Créer un plan d'investissement</small>
                    </h4>
                    <form action="{{route('adminInvest.post')}}" method="post" enctype="multipart/form-data">

                        {{csrf_field()}}

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


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="name">Nom du plan d'investissement</label>
                                    <input id="name" name="name" type="text" class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group label-floating">

                                    <select class="selectpicker" name="style_id" data-style="btn btn-warning btn-round" title="Sélectionnez" data-size="7">
                                        @foreach($styles as $style)
                                            <option value="{{$style->id}}"> {{$style->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="minimum">Investissement minimum (en Euro)</label>
                                    <input id="minimum" name="minimum" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="maximum">Investissement maximum (en Euro)</label>
                                    <input id="maximum" name="maximum" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="percentage">Retour d'intérêts (en pourcentage)</label>
                                    <input id="percentage" name="percentage" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="repeat">Répétition totale (Fréquence de retour des intérêts)</label>
                                    <input id="repeat" name="repeat" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="start_duration">Délai du début (en heure)</label>
                                    <input id="start_duration" name="start_duration" type="number" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="status" data-style="btn btn-warning btn-round" title="Sélectionnez l'état" data-size="7">
                                        <option value="0">Pas actif</option>
                                        <option value="1" >Actif</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br> <br>

                        <a href="{{route('adminInvest')}}" class="btn btn-rose">Annuler</a>

                        <button type="submit" class="btn btn-success pull-right">Créer un plan</button>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')

@endsection