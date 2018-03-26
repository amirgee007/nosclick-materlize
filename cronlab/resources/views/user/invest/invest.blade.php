@extends('layouts.dashboard')
@section('title', 'Historique investissements')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">equalizer</i>
                </div>
                <br>
                <h4 class="card-title">Historique d'investissements</h4>
                <div class="card-content">
                    <br>
                    @if(count($investments) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">Nº</th>
                                    <th class="text-center">Référence ID</th>
                                    <th class="text-center">Type d'investissement</th>
                                    <th class="text-center">Taux d'intérêt</th>
                                    <th class="text-center">Système d'intérêt</th>
                                    <th class="text-center">Montant</th>
                                    <th class="text-center">Début</th>
                                    <th class="text-center">Statut</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($investments as $investment)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$investment->reference_id}}</td>
                                        <td class="text-center">{{$investment->plan->style->name}}</td>
                                        <td class="text-center">{{$investment->plan->percentage +0}}%</td>
                                        <td class="text-center">{{$investment->plan->style->compound}} heures. Rétribué en {{$investment->plan->repeat}}x .</td>
                                        <td class="text-center">{{$investment->amount + 0 }} €</td>
                                        <td class="text-center">{{$investment->start_time->diffForHumans()}}</td>
                                        <td >
                                            @if($investment->status == 0)

                                                <button class="btn btn-danger">
                                        <span class="btn-label">
                                            <i class="material-icons">warning</i>
                                        </span>
                                                   En attente
                                                </button>


                                            @elseif($investment->status == 1)

                                                <button class="btn btn-info">
                                        <span class="btn-label">
                                            <i class="material-icons">autorenew</i>
                                        </span>
                                                    En cours
                                                </button>
                                            @else
                                                <button class="btn btn-success">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>
                                                    Terminé
                                                </button>

                                            @endif



                                        </td>
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

                            {{$investments->render()}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection