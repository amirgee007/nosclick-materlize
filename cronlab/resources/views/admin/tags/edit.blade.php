@extends('layouts.admin')

@section('title', 'Modifier le tag de blog')

@section('content')


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Modifier le tag du blog -
                        <small class="category">Balise de blog complète</small>
                    </h4>

                    <form action="{{route('admin.tag.update',['id'=> $tag->id])}}" method="post">
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


                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group label-floating">
                                    <label  class="control-label" for="tag">Nom du tag</label>
                                    <input id="tag" name="tag" type="text" value="{{$tag->tag}}" class="form-control">
                                </div>
                            </div>


                        </div>


                        <a href="{{route('admin.tags.index')}}" class="btn btn-rose">Annuler</a>
                        <button type="submit" class="btn btn-success pull-right">Sauvegarder</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
