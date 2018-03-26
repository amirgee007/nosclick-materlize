@extends('layouts.admin')

@section('title', 'Edition page HTML')

@section('styles')


@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Editer la page -
                        <small class="category">Modifier la page HTML</small>
                    </h4>
                    <form action="{{route('adminPage.update',['id'=>$page->id])}}" method="post">

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
                                    <label  class="control-label" for="title">Titre de la page</label>
                                    <input id="title" name="title" type="text" value="{{$page->title}}" class="form-control">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="status" data-style="btn btn-warning btn-round" title="Select Page Visibility" data-size="7">

                                            <option value="1" @if($page->status == 1) selected @endif >Actif</option>
                                            <option value="0" @if($page->status == 0) selected @endif >Inactif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="control-label" for="content">Contenu</label>
                                    <textarea class="form-control" name="body" id="content" rows="25">{{$page->content}}</textarea>
                                </div>
                            </div>
                        </div>

                        <a href="{{route('adminPages')}}" class="btn btn-rose">Annuler</a>

                        <button type="submit" class="btn btn-success pull-right">Sauvegarder</button>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')

@endsection