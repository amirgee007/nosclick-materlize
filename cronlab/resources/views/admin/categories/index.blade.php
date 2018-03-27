@extends('layouts.admin')

@section('title', 'Toutes les catégories')


@section('content')

    <div class="row">

        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Toutes les catégories du blogs</h4>
                <div class="card-content">
                    <br>


                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Nom</th>
                                <th>Créé</th>
                                <th>Mise à jour</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($categories)
                                @foreach($categories as $category)

                                    <tr>
                                        <td class="text-center">{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td>{{$category->updated_at->diffForHumans()}}</td>
                                        <td class="td-actions text-right">

                                            <a href="{{route('admin.category.edit', $category->id)}}" type="button" rel="tooltip" class="btn btn-success">
                                                <i class="material-icons">editer</i>
                                            </a>

                                            <a href="{{route('admin.category.delete', $category->id)}}" type="button" rel="tooltip" class="btn btn-danger">
                                                <i class="material-icons">fermer</i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach

                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Créer des catégories</h4>
                <div class="card-content">
                    <br>

                    <form class="m-form" action="{{route('admin.category.store')}}" method="post">

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

                            <div class="form-group">
                                <div class="form-group label-floating">

                                        <label  class="control-label" for="name">Nom complet</label>
                                        <input id="name" name="name" type="text" class="form-control">

                                </div>

                            </div>

                        </div>
                    </div>
                    <br>

                        <button type="submit" class="btn btn-success pull-right">Créer une catégorie</button>

                    <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection