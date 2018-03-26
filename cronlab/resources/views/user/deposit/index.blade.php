@extends('layouts.dashboard')
@section('title', 'Historique des dépôts')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">monetization_on</i>
                </div>
                <br>
                <h4 class="card-title">Historique des dépôts</h4>
                <div class="card-content">
                    <br>
                    @if(count($deposits) > 0)
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">Nº</th>
                                <th class="text-center">ID de transaction</th>
                                <th class="text-center">Processeur</th>
                                <th class="text-center">Montant</th>
                                <th class="text-center">Frais</th>
                                <th class="text-center">Montant net</th>
                                <th class="text-center">Mise à jour</th>
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
                                <td class="text-center">€ {{$deposit->amount +0}}</td>
                                <td class="text-center">€ {{$deposit->charge+0}}</td>
                                <td class="text-center">€ {{$deposit->net_amount+0}}</td>
                                @if($deposit->status == 1)
                                <td class="text-center">{{$deposit->updated_at->diffForHumans()}}</td>
                                @else
                                    <td class="text-center">{{$deposit->created_at->diffForHumans()}}</td>
                                @endif
                                <td >

                                    @if($deposit->status == 1)

                                        <button class="btn btn-success">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>
                                            Terminé
                                        </button>


                                    @else

                                        <button class="btn btn-info">
                                        <span class="btn-label">
                                            <i class="material-icons">autorenew</i>
                                        </span>
                                           En traitement
                                        </button>



                                    @endif



                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    @else

                        <h1 class="text-center">Aucun dépôt</h1>
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

    @if(config('app.chat'))

        @include('includes.chat')

    @else

    @endif

@endsection