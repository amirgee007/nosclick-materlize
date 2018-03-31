@extends('layouts.dashboard')
@section('title', 'Mes parrainages')
@section('content')


<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("Copy");
  alert("Votre lien: " + copyText.value);
}
</script>


    <div class="row">
        <div class="col-md-12">
             <div class="table-responsive">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">supervisor_account</i>
                </div>
                <br>
                <h4 class="card-title">Mes parrainages</h4>
                <div class="card-content">
                    <br>
                    <div class="table-responsive">
                        <br>
                        <div class="col-md-12">


                    @if($sponsor)
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">SN</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Abonnement</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center">Inscription</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center" width="10%" >
                                    <img src="{{@$sponsor->profile->avatar}}" class="img-circle" alt="No Photo"  >
                                </td>
                                <td class="text-center">{{@$sponsor->name}}</td>
                                <td class="text-center">{{@$sponsor->membership->name}}</td>
                                <td class="text-center">Actif</td>
                                <td class="text-center">{{@$sponsor->created_at->diffForHumans()}}</td>
                            </tr>
                            </tbody>
                        </table>
                    @endif


                        <div class="row">
                         <div class="col-md-12"

                         <h4><div class="card card-title pull-left text-center">

                        <input class="btn btn-info" style="width:60%" type="text" value="{{ $link }}" id="myInput">
                            <div class="btn" onclick="myFunction()">Copier votre lien</div>
                            </div></h4>
                            <br>
                            <br>
                            <br>
                            <br>
                            </div>
                            </div>
                             </div>
                            </div>



                        <br>

                      <div class="table-responsive">
                        <br>
                        <div class="col-md-12">
							
							<br><br>
                        @if(count($referrals) > 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">SN</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Abonnement</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center">Inscription</th>
                            </tr>
                            </thead>
                            <tbody>


                                @php $id=0;@endphp
                                @foreach($referrals as $referral)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center" width="10%" >
                                            <img src="{{$referral->user->profile->avatar}}" class="img-circle" alt="No Photo"  >
                                        </td>
                                        <td class="text-center">{{$referral->user->name}}</td>
                                        <td class="text-center">{{$referral->user->membership->name}}</td>
                                        <td class="text-center">Actif</td>
                                        <td class="text-center">{{$referral->user->created_at->diffForHumans()}}</td>
                                    </tr>

                                @endforeach


                            </tbody>
                        </table>

                            @else
                           <center> <h1> Il n'y a aucun parrainage.</h1></center>

                        @endif
                        </div>
                        </div>
            </div>
                </div>
            </div>
            </div>
		</div>

@endsection