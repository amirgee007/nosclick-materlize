@extends('layouts.admin')

@section('title', 'Gestion des emails')

@section('content')


    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">email</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Email -
                        <small class="category">Envoie d'email à un utilisateur</small>
                    </h4>

                   

                    <form action="{{route('adminEmail.send')}}" role="form" id="contact-form"  method="POST">
                        {{csrf_field()}}
                        <div class="card-content">
                            @if(count($errors) > 0)
                                <div class="alert alert-danger alert-with-icon" data-notify="container">
                                    <i class="material-icons" data-notify="icon">notifications</i>
                                    <span data-notify="message">
                                                        @foreach($errors->all() as $error)
                                            <li><strong> {{$error}} </strong></li>
                                        @endforeach
                                                    </span>
                                </div>
                                <br>
                            @endif
                            <div class="row">
                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="status" data-style="btn btn-success btn-round" title="Selection du type de déstinataire" data-size="7">
                                        <option value="1">Utilisateur</option>
                                        <option value="2">Externe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group label-floating">
                                <label for="email" class="control-label">Déstinataire</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <br>

                            <div class="form-group label-floating">
                                <label for="subject" class="control-label">Sujet</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                            <br>
                            <div class="form-group label-floating">
                                <label for="message" class="control-label">Message</label>
                                <textarea name="body" class="form-control" id="message" rows="20"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right">Envoyer</button>
                                </div>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>

    </div>

@endsection