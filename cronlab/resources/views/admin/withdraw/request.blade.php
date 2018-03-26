@extends('layouts.admin')

@section('title', 'Demande de retrait')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Demande de retrait</h4>
                <div class="card-content">
                    <br>

                    @if(count($withdraws) > 0)

                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Processeur</th>
                                    <th class="text-center">Montant</th>
                                    <th class="text-center">A envoyer</th>
                                    <th class="text-center">Montant</th>
                                    <th class="text-center">Demandé</th>
                                    <th class="text-center">Définir comme</th>
                                    <th class="text-center">Définir comme</th>
                                    <th class="text-center">Statut</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($withdraws as $withdraw)
                                    @php $id++;@endphp

                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$withdraw->gateway_name}}</td>
                                        <td class="text-center">{{$withdraw->amount}}</td>
                                        <td class="text-center">€ {{$withdraw->net_amount}}</td>
                                        <td class="text-center">{{$withdraw->account}}</td>
                                        <td class="text-center">{{$withdraw->created_at->diffForHumans()}}</td>
                                        <td class="text-center td-actions">

                                            @if($withdraw->status == 0)

                                                <a href="{{route('admin.withdraw.update', $withdraw->id)}}" type="button" class="btn btn-success">
                                                    <i class="material-icons">edit</i> Achevée
                                                </a>
                                            @endif

                                        </td>

                                        <td class="text-center td-actions">

                                            @if($withdraw->status == 0)
                                                <a href="{{route('admin.withdraw.fraud', $withdraw->id)}}" type="button" class="btn btn-warning">
                                                    <i class="material-icons">edit</i> Fraude
                                                </a>
                                            @endif

                                        </td>

                                        <td class="text-center td-actions">

                                            @if($withdraw->status == 1)
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

                        <h1 class="text-center">Aucune demande de retrait</h1>

                    @endif

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$withdraws->render()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection