@extends('layouts.admin')


@section('title', 'Voir tous les plans investissements')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Voir tous les plans d'investissements</h4>
                <div class="card-content">
                    <br>

                    @if(count($plans) > 0)

                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Minimum</th>
                                    <th class="text-center">Maximum</th>
                                    <th class="text-center">Intérêt</th>
                                    <th class="text-center">Système d'intérêt</th>
                                    <th class="text-center">Heure de début</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">Editer</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php $id=0;@endphp
                                @foreach($plans as $plan)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$plan->name}}</td>
                                        <td class="text-center">{{$plan->style->name}}</td>
                                        <td class="text-center">€ {{$plan->minimum + 0}}</td>
                                        <td class="text-center">€ {{$plan->maximum + 0}}</td>
                                        <td class="text-center">{{$plan->percentage}}%</td>
                                        <td class="text-center">{{$plan->style->compound}} Heures en {{$plan->repeat}}x .</td>
                                        <td class="text-center">{{$plan->start_duration}} Heures après validation</td>
                                        <td class="text-center">{{$plan->status == 1 ? 'Actif':'Pas Actif'}}</td>
                                        <td class="text-center">
                                            <a href="{{route('adminInvest.edit', $plan->id)}}" type="button" class="btn btn-success">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('adminInvest.delete', $plan->id)}}" type="button" class="btn btn-danger">
                                                <i class="material-icons">close</i>

                                            </a>
                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>

                        </div>

                    @else

                        <h1 class="text-center">Aucun plan d'investissement</h1>

                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
