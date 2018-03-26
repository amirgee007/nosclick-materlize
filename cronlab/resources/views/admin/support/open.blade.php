@extends('layouts.admin')

@section('title', 'Toutes les demandes de support ouvertes')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Toutes les demandes de support ouvertes</h4>
                <div class="card-content">
                    <br>
                    <br>
                    @if(count($open_supports) > 0)
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Numéro de Ticket</th>
                                    <th class="text-center">Sujet</th>
                                    <th class="text-center">Voir le membre</th>
                                    <th class="text-center">Voir le Ticket</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($open_supports as $support)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center"><code>{{$support->ticket}}</code></td>
                                        <td class="text-center">{{$support->subject}}</td>
                                        <td class="text-center">

                                            <a href="{{route('admin.user.edit', $support->user->id)}}" type="button" class="btn btn-rose">
                                                <i class="material-icons">search</i> Voir
                                            </a>


                                        </td>
                                        <td class="text-center">

                                            <a href="{{route('adminSupport.view', $support->ticket)}}" type="button" class="btn btn-info">
                                                <i class="material-icons">search</i> Voir
                                            </a>


                                        </td>
                                        <td class="text-center">

                                            @if($support->status == 1)
                                                <button class="btn btn-success">
                                                        <span class="btn-label">
                                                            <i class="material-icons">check</i>
                                                        </span>
                                                    Ouvert
                                                </button>

                                            @elseif($support->status == 2)
                                                <button class="btn btn-info">
                                                        <span class="btn-label">
                                                            <i class="material-icons">check</i>
                                                        </span>
                                                    Répondu par NOSCLICK
                                                </button>
                                            @elseif($support->status == 3)
                                                <button class="btn btn-warning">
                                                        <span class="btn-label">
                                                            <i class="material-icons">check</i>
                                                        </span>
                                                    Répondu par le membre
                                                </button>
                                            @elseif($support->status == 0)
                                                <button class="btn btn-danger">
                                                        <span class="btn-label">
                                                            <i class="material-icons">close</i>
                                                        </span>
                                                    Fermer
                                                </button>

                                            @endif

                                        </td>

                                        <td class="text-center"></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    @else

                        <h1 class="text-center">Pas de demande de support ouverte</h1>
                    @endif

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$open_supports->render()}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection