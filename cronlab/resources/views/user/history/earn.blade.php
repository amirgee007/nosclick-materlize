@extends('layouts.dashboard')
@section('title', 'Historique de vos gains')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">card_travel</i>
                </div>
                <br>
                <h4 class="card-title">Historique de vos gains</h4>
                <div class="card-content">
                    <br>
                    @if(count($earns) > 0)
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">Nº</th>
                                    <th class="text-center">ID de transaction</th>
                                    <th class="text-center">Source</th>
                                    <th class="text-center">De</th>
                                    <th class="text-center">Montant</th>
                                    <th class="text-center">Détails</th>
                                    <th class="text-center">Mise à jour</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($earns as $log)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$log->reference}}</td>
                                        <td class="text-center">{{$log->for}}</td>
                                        <td class="text-center">{{$log->from}}</td>
                                        <td class="text-center">€ {{$log->amount + 0}}</td>
                                        <td class="text-center">{{$log->details}}</td>
                                        <td class="text-center">{{$log->created_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    @else

                        <h1 class="text-center">Aucun historique de gains</h1>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$earns->render()}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection