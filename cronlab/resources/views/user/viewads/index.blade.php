@extends('layouts.dashboard')
@section('title', 'Lien PPC')
@section('content')



    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">link</i>
                </div>
                <br>
                <h4 class="card-title">Liens PPC</h4>
				<div class="pull-right"> Nous conseillons de visionné les PPC sur un ordinateur fixe avec <a href="https://www.google.fr/chrome/?brand=CHBD&gclid=EAIaIQobChMI2I-04b3C2QIVTrHtCh1wGgCXEAAYASAAEgKY3PD_BwE" target="_blank">&nbsp;<img src="/img/google1.png" style="width:20%" alt="google"/></a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div><br><br>
                <div class="card-content">
                    <br>

                    @if(count($adverts) > 0)
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Partenaire</th>
                                    <th>Gains</th>
                                    <th>Statut</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                @php $id=0;@endphp
                                @foreach($adverts as $advert)
                                    @php $id++;@endphp

                                    <tr>
                                        <td>{{ $id }}</td>
                                        <td><div style="width:50%"><img src="{{ $advert->ptc->partner }}"/></td>
                                        <td>€ {{ $advert->ptc->rewards +0 }}</td>
                                        <td>
                                            @if($advert->status == 0)
                                                <span class="btn btn-danger"><i class="material-icons">warning</i> Lien non ouvert</span>
                                            @else
                                                <span class="btn btn-primary"><i class="material-icons">link</i> Lien déjà ouvert</span>
                                            @endif
                                        </td>

                                        <td >
                                            @if($advert->status == 0)
                                                <a href="{{route('userCashLinks.show', $advert->id)}}" type="button" rel="tooltip" class="btn btn-info">
                                                    <i class="material-icons">link</i>
                                                    Voir le lien
                                                </a>
                                            @else
                                                <span class="btn btn-success"><i class="material-icons">done</i> Vu</span>
                                            @endif
                                        </td>



                                    </tr>

                                @endforeach


                                </tbody>

                            </table>



                        </div>
					@else

                        <h1 class="text-center">Aucun PPC en ce moment</h1>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$adverts->render()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection