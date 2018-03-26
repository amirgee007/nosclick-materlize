@extends('layouts.admin')

@section('title', 'Modifier les liens PTC')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Section PTC -
                        <small class="category">Modifier la publicité PTC</small>
                    </h4>
                    <form action="{{route('admin.ptc.update', ['id'=>$advertisement->id])}}" method="post">
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
                                    <input id="title" name="title" type="text" value="{{$advertisement->title}}" class="form-control">

                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">

                                    <label  class="control-label" for="ptc">Lien de site Web</label>
                                    <input id="ptc" name="ad_link" type="url" value="{{$advertisement->ad_link}}" class="form-control">

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="membership_id" data-style="btn btn-warning btn-round" title="Select Membership" data-size="7">
                                        @foreach($memberships as $membership)

                                            <option value="{{$membership->id}}"

                                                    @if($advertisement->membership->id == $membership->id)

                                                    selected

                                                    @endif

                                            > {{$membership->name}} </option>

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
                                    <input id="rewards" name="rewards" type="text" value="{{$advertisement->rewards}}" class="form-control">

                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="duration">Durée (Seconde)</label>
                                    <input id="duration" name="duration" type="number" value="{{$advertisement->duration}}" class="form-control">

                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">

                                    <label  class="control-label" for="details">Détails</label>
                                    <textarea class="form-control" name="details" id="details" rows="10"> {{$advertisement->details}}</textarea>

                                </div>
                            </div>
                        </div>

                        <a href="{{route('admin.ptcs.index')}}" class="btn btn-rose">Annuler</a>

                        <button type="submit" class="btn btn-success pull-right">Sauvegarder </button>

                        <div class="clearfix"></div>

                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection