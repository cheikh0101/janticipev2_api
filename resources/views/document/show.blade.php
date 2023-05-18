@extends('layouts.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>A propos du document</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <section id="contact" class="contact">
        <div class="container mt-5 php-email-form">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title">Libellé du document:</h4>{{ $document->name }}
                </div>
                <div class="col-md-6">
                    <h4 class="card-title">Description du document:</h4>
                    {!! $document->description !!}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <h4 class="card-title">Classe</h4>{{ $document->classe->libelle }}
                </div>
                <div class="col-md-6">
                    <h4 class="card-title">Cours</h4>{{ $document->cour->name }}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <h4 class="card-title">Publié le</h4>{{ $document->created_at }}
                </div>
                <div class="col-md-6">
                    <h4 class="card-title">Publié par:</h4>{{ $document->user->name }}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <h4 class="card-title">Visionner</h4>
                    <object data="myfile.pdf" type="application/pdf" width="100%" height="100%"> <a
                            href="{{ asset('/storage/documents/' . $document->file) }}">Bon visionnage!</a>
                    </object>
                </div>
            </div>
        </div>
    </section>
@endsection
