@extends('layouts.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Plus il y a de documents, mieux ça sera.</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Documents ({{ count($documents) }})</h2>
                <p>
                    {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newDocument">
                        <i class="fa fa-plus" aria-hidden="true"></i> Nouveau Document
                    </button> --}}
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-plus" aria-hidden="true"></i> Nouveau Document
                    </a>
                </p>
                @if (session()->has('storeDocument'))
                    <div class="alert alert-primary" role="alert">
                        <strong>{{ session()->get('storeDocument') }}</strong>
                    </div>
                @endif
                @if (session()->has('updateDocument'))
                    <div class="alert alert-primary" role="alert">
                        <strong>{{ session()->get('updateDocument') }}</strong>
                    </div>
                @endif
                @if (session()->has('deleteDocument'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ session()->get('deleteDocument') }}</strong>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col">
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <form action=" {{ route('document.store') }} " class="php-email-form" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Libelle du document</label>
                                            <input type="text" name="name" required id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Algorithme et Programmation 1" aria-describedby="helpId">
                                            @error('name')
                                                <small id="helpId" class="form-text text-danger">
                                                    {{ $errors->first('name') }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="type" class="form-label">Type du document</label>
                                            <select class="form-select" name="type" id="type" required>
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="file">Joindre le fichier</label>
                                            <input type="file" name="file" id="file"
                                                class="form-control @error('file') is-invalid @enderror">
                                            @error('file')
                                                <small id="file" class="form-text text-danger">
                                                    {{ $errors->first('file') }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="classe" class="form-label">Classe</label>
                                            <select class="form-select" name="classe" id="classe" required>
                                                @foreach ($classes as $classe)
                                                    <option value="{{ $classe->id }}">{{ $classe->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cours" class="form-label">Cours</label>
                                            <select class="form-select" name="cours" id="cours" required>
                                                @foreach ($cours as $cour)
                                                    <option value="{{ $cour->id }}">{{ $cour->name }} (
                                                        {{ $cour->classe->libelle }} )
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Commentaire</label>
                                            <textarea class="ckeditor form-control" name="description"></textarea>
                                            {{-- @error('description')
                                        <small id="helpId" class="form-text text-danger">
                                            {{ $errors->first('description') }}
                                        </small>
                                    @enderror --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-block">
                                            Enregistrer
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2" data-aos="zoom-in" data-aos-delay="100">
                @forelse ($documents as $document)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-2">
                        <div class="course-item">
                            <img src="../../assets/images/g.jpg" class="img-fluid" alt="...">
                            {{-- <img src=" {{ asset('/storage/documents/' . $document->file) }} " class="img-fluid"
                                alt="..."> --}}
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>{{ $document->cour->name }}</h4>
                                </div>
                                <h3><a href="{{ route('document.show', compact('document')) }}"> {{ $document->name }}
                                    </a>
                                </h3>
                                <p> {!! $document->description !!} </p>
                                <div class="d-flex justify-content-between align-items-center mb-3 mt-3">
                                    <span></span>
                                    <span class="badge bg-primary">{{ $document->type->name }}</span>
                                </div>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <span>Publié le: {{ $document->created_at->format('Y-m-d') }} </span>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <a href=" {{ route('document.show', compact('document')) }} "
                                            class="btn btn-primary">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        &nbsp;
                                        <a href=" {{ route('document.edit', compact('document')) }} "
                                            class="btn btn-warning">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        &nbsp;
                                        <form action=" {{ route('document.destroy', compact('document')) }} "
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>
                        Aucun document pour l'instant. Créez-en!
                    </p>
                    <section id="hero" class="d-flex align-items-center">
                        <div class="container d-flex flex-column align-items-center" data-aos="zoom-in"
                            data-aos-delay="100">
                            <iframe src="https://embed.lottiefiles.com/animation/73061"></iframe>
                        </div>
                    </section><!-- End Hero -->
                @endforelse

            </div>
            {{ $documents->links() }}
        </div>
    </section><!-- End Popular Courses Section -->
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
