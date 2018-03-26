@extends('layouts.dashboard')
@section('title', 'Historique des intérêts')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">device_hub</i>
                </div>
                <br>
                <h4 class="card-title">Historique des intérêts</h4>
                <div class="card-content">
                    <br>
                    @if(count($logs) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">Nº</th>
                                    <th class="text-center">Référence ID</th>
                                    <th class="text-center">Type d'investissement</th>
                                    <th class="text-center">Taux d'intérêt</th>
                                    <th class="text-center">Montant</th>
                                    <th class="text-center">Mise à jour</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($logs as $log)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$log->reference_id}}</td>
                                        <td class="text-center">{{$log->invest->plan->style->name}}</td>
                                        <td class="text-center">{{$log->invest->plan->percentage +0}}%</td>
                                         <td class="text-center">€ {{$log->amount + 0 }}</td>
                                        <td class="text-center">{{$log->created_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    @else

                        <h1 class="text-center">Aucune information</h1>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$logs->render()}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection