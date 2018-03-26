@extends('layouts.admin')
@section('title', $inbox->subject)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <h2 class="title"> Voir les emails</h2>
                        <h5 class="description">Mon email : {{$inbox->email}}</h5>
                    </div>
                </div>


                <div class="card-content">
                    <br>
                            <div class="col-md-10 col-md-offset-1">
                                <div class="card card-pricing card-raised">
                                    <div class="card-content">
                                        <h6 class="category">Mon nom : {{$inbox->name}}</h6>
                                        <div class="icon icon-info">
                                            <i class="material-icons">mail_outline</i>
                                        </div>
                                        <h5 class="card-title">
                                            <b> Contact par : {{$inbox->subject}}</b>
                                        </h5>
                                        <br>
                                        <div class="card-description">

                                            {!! $inbox->details !!}
                                        </div>
                                        <a href="{{route('adminEmail')}}" class="btn btn-success" type="button">

                                            Retour à la boîte de réception

                                        </a>
                                    </div>
                                </div>
                            </div>

                </div>
            </div>
        </div>
    </div>




@endsection