@extends('layouts.admin')


@section('title', 'Voir tous les processeurs')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Toutes les processeurs locales</h4>
                <div class="card-content">
                    <br>

                    @if(count($gateways) > 0)

                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Nº de compte</th>
                                    <th class="text-center">Frais fixes</th>
                                    <th class="text-center">Frais en pourcentage</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">Editer</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php $id=0;@endphp
                                @foreach($gateways as $gateway)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$gateway->name}}</td>
                                        <td width="10%" class="text-center">
                                            <img src="{{asset($gateway->image)}}" class="img-circle" alt="No Photo">

                                        </td>
                                        <td class="text-center">{{$gateway->account}}</td>
                                        <td class="text-center">€ {{$gateway->fixed}}</td>
                                        <td class="text-center">{{$gateway->percent}} %</td>
                                        <td class="text-center">{{$gateway->status == 1 ? 'Actif':'Pas Actif'}}</td>
                                        <td class="text-center">
                                            <a href="{{route('admin.local.edit', $gateway->id)}}" type="button" class="btn btn-success">
                                                <i class="material-icons">edit</i>

                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('admin.local.delete', $gateway->id)}}" type="button" class="btn btn-danger">
                                                <i class="material-icons">close</i>

                                            </a>
                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>

                        </div>

                    @else

                        <h1 class="text-center">Aucun processeur de paiement local</h1>

                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
