@extends('layouts.admin')

@section('title', 'Modifier le style de retour investissement')

@section('content')


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Modifier le style de retour d'investissement -
                        <small class="category">Modifier le style</small>
                    </h4>

                    <form action="{{route('adminStyle.update',['id'=>$style->id])}}" method="post">
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
                        <br><br>


                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group label-floating">
                                    <label  class="control-label" for="name">Nom du style</label>
                                    <input id="name" name="name" type="text" value="{{$style->name}}" class="form-control">
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <div class="form-group label-floating">

                                        <label  class="control-label" for="compound">Temps (en heures)</label>
                                        <input id="compound" name="compound" type="number"value="{{$style->compound}}" class="form-control">

                                    </div>

                                </div>

                            </div>
                        </div>

                        <br><br><br>
                        <a href="{{route('adminStyle')}}" class="btn btn-rose">Annuler</a>
                        <button type="submit" class="btn btn-success pull-right">Mise à jour</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
