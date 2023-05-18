@extends('layouts.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>{{ config('app.name') }}, au service des étudiants.</h2>
        </div>
    </div><!-- End Breadcrumbs -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="fa fa-bar-chart fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                            <div class="col mr-2">
                                <div class="h5 mb-0 text-center font-weight-bold text-gray-800">STATISTIQUES</div>
                                <div class=" mb-0 text-center font-weight-bold text-gray-800">Plus il y a de documents,
                                    mieux ce sera! &smile;</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-bar-chart fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Classe sous votre responsabilité ( {{ count($responsableClasses) }} )
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @forelse ($responsableClasses as $responsableClasse)
                                        <ul>
                                            <li>
                                                {{ $responsableClasse->classe->libelle }}
                                            </li>
                                        </ul>
                                    @empty
                                        Aucune classe pour l'instant
                                    @endforelse
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-book fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Nombre de document publiés</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $nbreDocuments }} </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-bookmark fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Nombre de document publié pour chaque cours</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> xxx </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-bookmark fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div style="height: 20px"></div>
@endsection
