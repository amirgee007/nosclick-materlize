@extends('layouts.admin')

@section('title', 'Toutes les demandes de vérification identité')

@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Toutes les demandes de vérification d'identité</h4>


                <div class="card-content">

                    <br>


                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Dste de naissance</th>
                                <th class="text-center">Recto</th>
                                <th class="text-center">Verso</th>
                                <th class="text-center">Vue</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($kycs)

                                @php $id=0;@endphp

                                @foreach($kycs as $kyc)

                                    @php $id++;@endphp

                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$kyc->name}}</td>
                                        <td class="text-center">{{$kyc->user->name}}</td>
                                        <td class="text-center">{{$kyc->dob->toFormattedDateString()}}</td>
                                        <td width="20%" >
                                            <img src="{{$kyc->front}}" class="img-rounded" alt="Image Recto"  >
                                        </td>
                                        <td width="20%" >
                                            <img src="{{$kyc->back}}" class="img-rounded" alt="Image Verso"  >
                                        </td>
                                        <td class="td-actions text-center">
                                            <a href="{{route('adminKycShow', $kyc->id)}}" type="button" rel="tooltip" class="btn btn-success">Voir</a>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif

                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$kycs->render()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
                <div class="card card-content">
                    <div class="card-content">
                        <form action="{{route('admin.users.index')}}" method="get">
                            <div class="form-group label-floating">
                                <label for="s" class="control-label">Chercher</label>
                                <input type="text" id="s" name="s" value="{{isset($s) ? $s : ''}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ">Chercher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
