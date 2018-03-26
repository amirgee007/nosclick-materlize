@extends('layouts.admin')

@section('title', 'Email')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Tous les emails</h4>
                <div class="card-content">
                    <br>

                    @if(count($inboxes) > 0)

                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Sujet</th>
                                    <th class="text-center">Mise à jour</th>
                                    <th class="text-center">Voir</th>
                                    <th class="text-center">Statut</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($inboxes as $inbox)
                                    @php $id++;@endphp

                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$inbox->name}}</td>
                                        <td class="text-center">{{$inbox->email}}</td>
                                        <td class="text-center">{{$inbox->subject}}</td>
                                        <td class="text-center">{{$inbox->created_at->diffForHumans()}}</td>
                                        <td class="text-center">

                                            <a href="{{route('adminEmail.show', $inbox->id)}}" class="btn btn-info" type="button">

                                                Voir

                                            </a>


                                        </td>

                                        <td class="text-center">

                                            @if($inbox->status == 1)

                                                <button class="btn btn-success">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>
                                                    Déjà vu
                                                </button>


                                            @else

                                                <button class="btn btn-warning">
                                        <span class="btn-label">
                                            <i class="material-icons">warning</i>
                                        </span>
                                                    Pas encore vu
                                                </button>



                                            @endif



                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>

                            </table>
                        </div>

                    @else

                        <h1 class="text-center">Aucun email</h1>

                    @endif

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$inboxes->render()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection