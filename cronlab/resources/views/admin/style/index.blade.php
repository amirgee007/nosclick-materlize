@extends('layouts.admin')

@section('title', 'Tous les placements et style de rendement ou créez un placement')


@section('content')

    <div class="row">

        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Tous les placements d'investissements</h4>
                <div class="card-content">
                    <br>


                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Heures</th>
                                <th class="text-center">Editer</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($styles)
                                @foreach($styles as $style)

                                    <tr>
                                        <td class="text-center">{{$style->id}}</td>
                                        <td class="text-center">{{$style->name}}</td>
                                        <td class="text-center">{{$style->compound}}</td>
                                        <td class="text-center">
                                            <a href="{{route('adminStyle.edit', $style->id)}}" type="button" rel="tooltip" class="btn btn-success">
                                                <i class="material-icons">edit</i>
                                            </a>

                                        </td>
                                        <td  class="text-center">

                                            <a href="{{route('adminStyle.delete', $style->id)}}" type="button" rel="tooltip" class="btn btn-danger">
                                                <i class="material-icons">close</i>
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
                <h4 class="card-title"> ou Créer un style</h4>
                <div class="card-content">
                    <br>

                    <form class="m-form" action="{{route('adminStyle.post')}}" method="post">

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

                                        <label  class="control-label" for="name">Nom du style</label>
                                        <input id="name" name="name" type="text" class="form-control">

                                    </div>

                                </div>

                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <div class="form-group label-floating">

                                        <label  class="control-label" for="compound">Temps (en heures)</label>
                                        <input id="compound" name="compound" type="number" class="form-control">

                                    </div>

                                </div>

                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success pull-right">Créer un style</button>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
