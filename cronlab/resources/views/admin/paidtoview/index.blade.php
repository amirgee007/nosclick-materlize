@extends('layouts.admin')

@section('title', 'Toutes les publicités PPV')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Toutes les publicités PPV</h4>
                <div class="card-content">
                    <br>
					
						@if(count($advertisements) > 0)

                    <div class="table-responsive">

                        


                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Titre</th>
                                <th class="text-center">Détails</th>
                                <th class="text-center">Code</th>
                                <th class="text-center">Abonnement</th>
                                <th class="text-center">Par Click</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center">Editer</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php $id=0;@endphp
                                @foreach($advertisements as $advertisement)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$advertisement->title}}</td>
                                        <td class="text-center">{!! $advertisement->details !!}</td>
                                        <td class="text-center">{{$advertisement->code}}</td>
                                        <td class="text-center">{{$advertisement->membership->name}}</td>
                                        <td class="text-center">€ {{$advertisement->rewards + 0}}</td>
                                        <td class="text-center">{{$advertisement->status == 1 ? 'Active':'Not Active'}}</td>
                                        <td class="text-center">
                                            <a href="{{route('admin.ppv.edit', $advertisement->id)}}" type="button" rel="tooltip" class="btn btn-info">
                                                <i class="material-icons">edit</i>

                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('admin.ppv.delete', $advertisement->id)}}" type="button" rel="tooltip" class="btn btn-danger">
                                                <i class="material-icons">close</i>

                                            </a>
                                        </td>
                                    </tr>
                                @endforeach







                            </tbody>
                        </table>




                    </div>

                    @else

                        <h1 class="text-center">Aucune publicité</h1>

                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$advertisements->render()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
