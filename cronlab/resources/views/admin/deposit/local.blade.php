@extends('layouts.admin')

@section('title', 'Toute les demandes de dépôt')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Demande de dépôt</h4>
                <div class="card-content">
                    <br>
                    <br>
                    @if(count($deposits) > 0)
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Transaction Id</th>
                                    <th class="text-center">Processeur</th>
                                    <th class="text-center">Montant</th>
                                    <th class="text-center">Détails</th>
                                    <th class="text-center">Durée</th>
                                    <th class="text-center">Définir comme</th>
                                    <th class="text-center">Définir comme</th>
                                    <th class="text-center">Statut</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($deposits as $deposit)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$deposit->transaction_id}}</td>
                                        <td class="text-center">{{$deposit->gateway_name}}</td>
                                        <td class="text-center">€ {{$deposit->amount}}</td>
                                        <td class="text-center">{{$deposit->details}}</td>
                                        <td class="text-center">{{$deposit->created_at->diffForHumans()}}</td>
                                        <td class="text-center td-actions">

                                            @if($deposit->status == 0)

                                                <a href="{{route('admin.deposit.update', $deposit->id)}}" type="button" class="btn btn-success">
                                                    <i class="material-icons">edit</i> Achevée
                                                </a>
                                            @endif

                                        </td>

                                        <td class="text-center td-actions">

                                            @if($deposit->status == 0)
                                                <a href="{{route('admin.deposit.fraud', $deposit->id)}}" type="button" class="btn btn-warning">
                                                    <i class="material-icons">edit</i> Fraude
                                                </a>
                                            @endif

                                        </td>

                                        <td class="text-center td-actions">

                                            @if($deposit->status == 1)
                                                <button class="btn btn-success btn-sm">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>Terminé
                                                </button>

                                            @else

                                                <button class="btn btn-primary btn-sm">
                                        <span class="btn-label">
                                            <i class="material-icons">warning</i>
                                        </span>
                                                    En attente
                                                </button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    @else

                        <h1 class="text-center">Pas de demande de dépôt</h1>
                    @endif

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$deposits->render()}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection