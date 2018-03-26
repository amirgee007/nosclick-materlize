@extends('layouts.admin')

@section('title', 'Modifier la catégorie')

@section('content')


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Modifier la catégorie de message -
                        <small class="category">Modifier la publication / Actualités / Événement / Catégorie de promotion</small>
                    </h4>

                    <form action="{{route('admin.category.update',['id'=>$category->id])}}" method="post">
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
                                    <label  class="control-label" for="name">Nom de catégorie</label>
                                    <input id="name" name="name" type="text" value="{{$category->name}}" class="form-control">
                                </div>
                            </div>

                        </div>
                        <br><br><br>
                        <a href="{{route('admin.category.index')}}" class="btn btn-rose">Annuler</a>
                        <button type="submit" class="btn btn-success pull-right">Mise à jour</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
