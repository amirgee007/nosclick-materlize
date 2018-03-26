@extends('layouts.admin')

@section('title', 'Créer un nouveau PPV')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Section PPV -
                        <small class="category">Créer une nouvelle publicité PPV</small>
                    </h4>
                    <form action="{{route('admin.ppv.store')}}" method="post">
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

                                <label  class="control-label" for="title">Titre</label>
                                <input id="title" name="title" type="text" class="form-control">

                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group label-floating">

                                <label  class="control-label" for="ptc">Code d'intégration Youtube</label>
                                    <input id="ptc" name="code" type="text" class="form-control">

                            </div>
                        </div>
                    </div>
                        <br>
                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group label-floating">
                                <select class="selectpicker" name="membership_id" data-style="btn btn-warning btn-round" title="Sélectionner" data-size="7">
                                    @foreach($memberships as $membership)

                                        <option value="{{$membership->id}}"> {{$membership->name}} </option>

                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label  class="control-label" for="rewards">Gains</label>
                                <input id="rewards" name="rewards" type="text" class="form-control">

                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label  class="control-label" for="duration">Durée (Seconde)</label>
                                <input id="duration" name="duration" type="number" class="form-control">

                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group label-floating">

                                <label  class="control-label" for="details">Détails</label>
                                <textarea class="form-control" name="details" id="details" rows="10"></textarea>

                            </div>
                        </div>
                    </div>

                    <a href="{{route('admin.ppvs.index')}}" class="btn btn-rose">Annuler</a>

                    <button type="submit" class="btn btn-success pull-right">Créer PPV</button>

                    <div class="clearfix"></div>

                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection