@extends('layouts.admin')

@section('title', 'Utilisateur')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Utilisateur</h4>


                <div class="card-content">

                    <br>


                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Compte</th>
                                <th class="text-center">Affiliation</th>
                                <th class="text-center">Dépôt</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center"></th>
                                <th class="text-center"></th>
                                <th class="text-center"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($users)

                                @php $id=0;@endphp

                                @foreach($users as $user)

                                    @php $id++;@endphp

                            <tr>
                                <td class="text-center">{{ $id }}</td>
                                <td width="10%" >
                                    <img src="{{asset(@$user->profile->avatar)}}" class="img-circle" alt="User Photo"  >
                                </td>
                                <td class="text-center">{{$user->name}}</td>
                                <td class="text-center">$ {{@$user->profile->main_balance + 0}}</td>
                                <td class="text-center">$ {{@$user->profile->referral_balance +0}}</td>
                                <td class="text-center">$ {{@$user->profile->deposit_balance +0}}</td>
                                <td class="text-center">Actif</td>
                                <td class="td-actions text-center">
                                        <a href="{{route('admin.user.edit', $user->id)}}" type="button" rel="tooltip" class="btn btn-success">Voir</a>
                                </td>
                                <td class="td-actions text-center">
                                    <a href="{{route('admin.user.edit', $user->id)}}" type="button" rel="tooltip" class="btn btn-rose">Editer</a>
                                </td>
                                <td class="td-actions text-center">
                                    <a href="{{route('admin.user.edit', $user->id)}}" type="button" rel="tooltip" class="btn btn-danger">Effacer</a>
                                </td>
                            </tr>
                                    @endforeach

                                @endif

                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-sm-offset-3">

                            {{$users->appends(['s'=>$s])->render()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>


  
            <div class="col-md-12">
                <div class="card card-content">
                    <div class="card-content">
                        <form action="{{route('admin.users.index')}}" method="get">
                            <div class="form-group label-floating">
                                <label for="s" class="control-label">Nom, Email, etc.</label>
                                <input type="text" id="s" name="s" value="{{isset($s) ? $s : ''}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ">Rechercher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
