@extends('layouts.admin')

@section('title', 'Créer un nouveau PTC')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Section PTC -
                        <small class="category">Créer une nouvelle publicité PTC</small>
                    </h4>
                    <form action="{{route('admin.ptc.store')}}" method="post">
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
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Sélectionner une image</span>
                                                        <span class="fileinput-exists">Changer</span>
                                                      <input type="file" name="partner" />
                                                    </span>
                                    <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Effacer</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group label-floating">

                                <label  class="control-label" for="ptc">Lien de site Web</label>
                                <input id="ptc" name="ad_link" type="url" class="form-control">

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
                        
    

                    <a href="{{route('admin.ptcs.index')}}" class="btn btn-rose">Annuler</a>

                    <button type="submit" class="btn btn-success pull-right">Créer un PTC</button>

                    <div class="clearfix"></div>

                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection