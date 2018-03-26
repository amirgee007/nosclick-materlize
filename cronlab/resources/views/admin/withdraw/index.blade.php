@extends('layouts.admin')

@section('title', 'Retrait des membres effectués')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Tous les retraits effectués</h4>
                <div class="card-content">
                    <br>

                    @if(count($withdraws) > 0)

                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">SN</th>
                                <th class="text-center">Transaction Id</th>
                                <th class="text-center">Processeur</th>
                                <th class="text-center">Montant</th>
                                <th class="text-center">Frais</th>
                                <th class="text-center">Versé</th>
                                <th class="text-center">Terminé</th>
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
                                        <td class="text-center">€ {{$withdraw->amount}}</td>
                                        <td class="text-center">€ {{$withdraw->charge}}</td>
                                        <td class="text-center">€ {{$withdraw->net_amount}}</td>
                                        <td class="text-center">{{$withdraw->updated_at->diffForHumans()}}</td>

                                        <td class="text-center">

                                            @if($withdraw->status == 1)

                                                <button class="btn btn-success">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>
                                                    Terminé
                                                </button>


                                            @else

                                                <button class="btn btn-warning">
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

                        <h1 class="text-center">Pas de retrait</h1>

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