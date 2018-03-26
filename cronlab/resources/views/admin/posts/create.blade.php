@extends('layouts.admin')

@section('title', 'Créer un nouveau blog')

@section('styles')


@endsection


@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Blog -
                        <small class="category">Créer un nouveau message</small>
                    </h4>
                    <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">

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
                                <label  class="control-label" for="title">Titre de l'article</label>
                                <input id="title" name="title" type="text" class="form-control">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Sélectionner une image</span>
                                                        <span class="fileinput-exists">Changer</span>
                                                      <input type="file" name="featured" />
                                                    </span>
                                    <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Effacer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <select class="selectpicker" name="category_id" data-style="btn btn-warning btn-round" title="Select Category" data-size="7">
                                            @foreach($categories as $category)

                                                <option value="{{$category->id}}"> {{$category->name}} </option>

                                            @endforeach

                                        </select>
                                    </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="category" data-style="btn btn-warning btn-round" multiple title="Select Category" data-size="7">
                                        @foreach($tags as $tag)

                                            <option value="{{$tag->id}}"> {{$tag->tag}} </option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                    <br>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="control-label" for="content">Post Content</label>
                                <textarea class="form-control" name="body" id="content" rows="10"></textarea>
                            </div>
                        </div>
                    </div>

                    <a href="{{route('admin.posts.index')}}" class="btn btn-rose">Annuler le message</a>

                        <button type="submit" class="btn btn-success pull-right">Créer un message</button>

                    <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')

@endsection