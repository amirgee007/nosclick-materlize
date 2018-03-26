@extends('layouts.dashboard')
@section('title', 'Avis')
@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>

                <div class="card-content">
                    <h4 class="card-title">Avis -
                        <small class="category">Écrivez un avis</small>
                    </h4>
                    <br>

                    @if(count($review) == 0)

                    <form action="{{route('userReview.post')}}" method="post">
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
                                    <label  class="control-label" for="title">Sujet</label>
                                    <input id="title" name="title" type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="comment">Votre avis </label>
                                    <textarea name="comment" class="form-control" id="comment" rows="20"></textarea>
                                </div>
                            </div>
                        </div>
                        <br> <br>
                        <a href="{{route('userDashboard')}}" class="btn btn-rose">Annuler</a>
                        <button type="submit" class="btn btn-success pull-right">Poster</button>
                        <div class="clearfix"></div>
                    </form>
                    @else

                    <h4 class="text-center text-success"> Vous avez déjà soumis un avis</h4>

                    @endif

                </div>
            </div>
        </div>

    </div>


@endsection