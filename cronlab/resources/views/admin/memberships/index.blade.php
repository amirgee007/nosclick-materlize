@extends('layouts.admin')

@section('title', 'Voir toutes les abonnements')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Tous les abonnements</h4>
                <div class="card-content">
                    <br>

						@if(count($memberships) > 0)
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Détails</th>
                                <th class="text-center">Prix</th>
                                <th class="text-center">Durée</th>
                                <th class="text-center">Editer</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            
                                @foreach($memberships as $membership)

                                    <tr>
                                        <td class="text-center">{{$membership->id}}</td>
                                        <td class="text-center">{{$membership->name}}</td>
                                        <td class="text-center">{!! str_limit($membership->détails,60) !!}</td>
                                        <td class="text-center">

                                            @if($membership->price == 0)

                                                Gratuit

                                            @else
                                               € {{$membership->price + 0}}
                                            @endif

                                        </td>
                                        <td class="text-center">{{$membership->duration}} Jours</td>
                                        <td class="text-center">
                                            <a href="{{route('admin.membership.edit', $membership->id)}}" type="button" rel="tooltip" class="btn btn-success">
                                                <i class="material-icons">edit</i>

                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <a href="{{route('admin.membership.delete', $membership->id)}}" type="button" rel="tooltip" class="btn btn-danger">
                                                <i class="material-icons">close</i>

                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                          

                            </tbody>
                        </table>




                    </div>
					
					 @else

                        <h1 class="text-center">Aucun plan d'adhésion</h1>

                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
