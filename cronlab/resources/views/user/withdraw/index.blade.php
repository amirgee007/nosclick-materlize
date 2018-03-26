@extends('layouts.dashboard')
@section('title', 'Historique des retraits')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">get_app</i>
                </div>
                <br>
                <h4 class="card-title">Historique des retraits</h4>
                <div class="card-content">
                    <br>
                    @if(count($withdraws) > 0)
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">Nª</th>
                                <th class="text-center">ID de transaction</th>
                                <th class="text-center">Processeur</th>
                                <th class="text-center">Compte</th>
                                <th class="text-center">Montant</th>
                                <th class="text-center">Frais</th>
                                <th class="text-center">Montant net</th>
                                <th class="text-center">Mise à jour</th>
                                <th class="text-center">Statut</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $id=0;@endphp
                                @foreach($withdraws as $withdraw)
                                    @php $id++;@endphp
                            <tr>
                                <td class="text-center">{{ $id }}</td>
                                <td class="text-center">{{$withdraw->transaction_id}}</td>
                                <td class="text-center">{{$withdraw->gateway_name}}</td>
                                <td class="text-center">{{$withdraw->account}}</td>
                                <td class="text-center">€ {{$withdraw->amount +0}}</td>
                                <td class="text-center">€ {{$withdraw->charge+0}}</td>
                                <td class="text-center">€ {{$withdraw->net_amount+0}}</td>
                                @if($withdraw->status == 1)
                                    <td class="text-center">{{$withdraw->updated_at->diffForHumans()}}</td>
                                @else
                                    <td class="text-center">{{$withdraw->created_at->diffForHumans()}}</td>
                                @endif
                                <td >

                                    @if($withdraw->status == 1)

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

                        <h1 class="text-center">Aucun retrait</h1>
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


    @if(config('app.chat'))

        @include('includes.chat')

    @else

    @endif

@endsection