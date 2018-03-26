@extends('layouts.admin')

@section('title', 'Créer un processeur de paiement')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Processeur -
                        <small class="category">Ajouter un processeur</small>
                    </h4>

                    <form action="{{route('admin.local.store')}}" method="post" enctype="multipart/form-data">

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

                                    <label  class="control-label" for="name">Nom du processeur</label>
                                    <input id="name" name="name" type="text" class="form-control">

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Sélectionnez le logo du processeur</span>
                                                        <span class="fileinput-exists">Changer le logo du processeur</span>
                                                      <input type="file" name="image" />
                                                    </span>
                                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Effacer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="status" data-style="btn btn-warning btn-round" title="Select Status" data-size="7">
                                        <option value="0">Pas Actif</option>
                                        <option value="1" selected>Actif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">

                                    <label  class="control-label" for="account">Compte du processeur</label>
                                    <input id="account" name="account" type="text" class="form-control">

                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">

                                    <label  class="control-label" for="fixed">Frais fixes du processeur</label>
                                    <input id="fixed" name="fixed" type="text" class="form-control">

                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="percent">Frais en pourcentage du processeur</label>
                                    <input id="percent" name="percent" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="ex_percent">Frais de change en pourcentage</label>
                                    <input id="ex_percent" name="ex_percent" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">

                                    <label  class="control-label" for="details">Détails du processeur</label>
                                    <textarea class="form-control" name="details" id="details" rows="10"></textarea>

                                </div>
                            </div>
                        </div>


                        <a href="{{route('admin.gateways.local')}}" class="btn btn-rose">Annuler</a>
                        <button type="submit" class="btn btn-success pull-right">Ajouter un processeur</button>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection