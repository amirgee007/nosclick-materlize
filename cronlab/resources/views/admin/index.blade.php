@extends('layouts.admin')

@section('title', 'Tableau de bord administration')

@section('content')

    <div class="row">

        @if(
        count($deposit_notify) > 0 or
        count($withdraw_notify) > 0 or
         count($kyc_notify) > 0 or
        count($kyc2_notify) > 0)

        <div class="col-md-5">

                <div class="card-content">
                    <div class="alert alert-with-icon" data-notify="container">
                        <i class="material-icons" data-notify="icon">notifications</i>
                        <span class="text-center" data-notify="message">Bonjour {{Auth::user()->name}} !! </span>
                        <br>
                        @if(count($deposit_notify) > 0)
                            <span data-notify="message">Il y a <b>{{count($deposit_notify)}} </b>demande de dépôt.</span>
                        @endif
                        @if(count($withdraw_notify) > 0)
                            <span data-notify="message">Il y a  <b>{{count($withdraw_notify)}} </b>demande de retrait.</span>
                        @endif
                        @if(count($kyc_notify) > 0)
                            <span data-notify="message">Il y a  <b>{{count($kyc_notify)}} </b>demande de vérification d'identité.</span>
                        @endif
                        @if(count($kyc2_notify) > 0)
                            <span data-notify="message">Il y a <b>{{count($kyc2_notify)}} </b>demande de vérification d'adresse.</span>
                        @endif
                    </div>
                </div>

        </div>
            @else
            <div class="col-md-12">
                
                    <div class="card-content">
                        <div class="alert alert-info alert-with-icon" data-notify="container">
                            <i class="material-icons" data-notify="icon">notifications</i>

                                <span data-notify="message">Bonjour {{Auth::user()->name}}, <br>Il n'y a pas de tâche en attente.</span>
                        </div>
                    </div>

            </div>
        @endif
    </div>

    <!--<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">language</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Ventes mondiales par principaux Pays</h4>
    <div class="row">
        <div class="col-md-5">
            <div class="table-responsive table-sales">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <div class="flag">
                                <img src="{{asset('img/flags/US.png')}}">
                            </div>
                        </td>
                        <td>USA</td>
                        <td class="text-right">
                            2.920
                        </td>
                        <td class="text-right">
                            53.23%
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="flag">
                                <img src="{{asset('img/flags/DE.png')}}">
                            </div>
                        </td>
                        <td>Germany</td>
                        <td class="text-right">
                            1.300
                        </td>
                        <td class="text-right">
                            20.43%
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="flag">
                                <img src="{{asset('img/flags/AU.png')}}">
                            </div>
                        </td>
                        <td>Australia</td>
                        <td class="text-right">
                            760
                        </td>
                        <td class="text-right">
                            10.35%
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="flag">
                                <img src="{{asset('img/flags/GB.png')}}">
                            </div>
                        </td>
                        <td>United Kingdom</td>
                        <td class="text-right">
                            690
                        </td>
                        <td class="text-right">
                            7.87%
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="flag">
                                <img src="{{asset('img/flags/RO.png')}}">
                            </div>
                        </td>
                        <td>Romania</td>
                        <td class="text-right">
                            600
                        </td>
                        <td class="text-right">
                            5.94%
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="flag">
                                <img src="{{asset('img/flags/BR.png')}}">
                            </div>
                        </td>
                        <td>Brasil</td>
                        <td class="text-right">
                            550
                        </td>
                        <td class="text-right">
                            4.34%
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-1">
            <div id="worldMap" class="map"></div>
        </div>
    </div>

                </div>
            </div>
        </div>
    </div>-->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                      
                        <div class="card-content">
                            <p class="category">EUR</p>
                            <h4 class="card-title">{{$earn + 0}}</h4>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">account_circle</i>
                                Total des gains
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                      
                        <div class="card-content">
                            <p class="category">EUR</p>

                            <h4 class="card-title">{{$invest + 0}}</h4>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">compare_arrows</i> Total des investissements
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                       
                        <div class="card-content">
                            <p class="category">EUR</p>

                            <h4 class="card-title">{{$deposit + 0}}</h4>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">eject</i> Total des dépôts
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                      
                        <div class="card-content">
                            <p class="category">EUR</p>
                            <h4 class="card-title">{{$pending + 0}}</h4>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">hourglass_empty</i> Total des retraits en attente
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>

           <!-- <div class="row">
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header" data-background-color="rose" data-header-animation="true">
                            <div class="ct-chart" id="websiteViewsChart"></div>
                        </div>
                        <div class="card-content">
                            <div class="card-actions">
                                <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                </button>
                                <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Rafraîchir">
                                    <i class="material-icons">refresh</i>
                                </button>
                                <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Modifier la date">
                                    <i class="material-icons">edit</i>
                                </button>
                            </div>
                            <h4 class="card-title">Vues du site Web</h4>
                            <p class="category">Dernière performance de la campagne</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> campagne envoyée il y a 2 jours
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header" data-background-color="green" data-header-animation="true">
                            <div class="ct-chart" id="dailySalesChart"></div>
                        </div>
                        <div class="card-content">
                            <div class="card-actions">
                                <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                </button>
                                <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Rafraîchir">
                                    <i class="material-icons">refresh</i>
                                </button>
                                <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Modifier la date">
                                    <i class="material-icons">edit</i>
                                </button>
                            </div>
                            <h4 class="card-title">Ventes quotidiennes</h4>
                            <p class="category">
                                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> augmenter les ventes d'aujourd'hui.</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> mis à jour il y a 4 minutes
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header" data-background-color="blue" data-header-animation="true">
                            <div class="ct-chart" id="completedTasksChart"></div>
                        </div>
                        <div class="card-content">
                            <div class="card-actions">
                                <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                </button>
                                <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Rafraîchir">
                                    <i class="material-icons">refresh</i>
                                </button>
                                <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Modifier la date">
                                    <i class="material-icons">edit</i>
                                </button>
                            </div>
                            <h4 class="card-title">Tâches terminées</h4>
                            <p class="category">Dernière performance de la campagne</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> campagne envoyée il y a 2 jours
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->

@endsection
