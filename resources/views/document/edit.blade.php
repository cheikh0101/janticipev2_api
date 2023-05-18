@extends('layouts.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Plus il y a de documents, mieux ça sera.</h2>
        </div>
    </div><!-- End Breadcrumbs -->
    <section id="contact" class="contact">
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="card- contact">
                        <div class="alert alert-danger">
                            <p>
                                La modification d'un document est une grande responsabilité. Soyez attentionnés s'il
                                vous plaît!
                            </p>
                        </div>
                        <form action=" {{ route('document.update', compact('document')) }} " class="php-email-form"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Libelle du document</label>
                                        <input type="text" name="name" required id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value=" {{ $document->name }} " placeholder="Algorithme et Programmation 1"
                                            aria-describedby="helpId">
                                        @error('name')
                                            <small id="helpId" class="form-text text-danger"> {{ $errors->first('name') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="type" class="form-label">Type du document</label>
                                        <select class="form-select" name="type" @error('type') is-invalid @enderror"
                                            id="type" required>
                                            @forelse ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}
                                                </option>
                                            @empty
                                                <option selected>Aucun type de document</option>
                                            @endforelse
                                        </select>
                                        @error('type')
                                            <small id="helpId" class="form-text text-danger"> {{ $errors->first('type') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="file">Joindre le fichier</label>
                                        <input type="file" name="file" id="file"
                                            class="form-control @error('file') is-invalid @enderror">
                                        @error('file')
                                            <small id="file" class="form-text text-danger"> {{ $errors->first('file') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="classe" class="form-label">Classe</label>
                                        <select class="form-select" name="classe" id="classe" required>
                                            @forelse ($classes as $classe)
                                                <option value="{{ $classe->id }}">{{ $classe->libelle }}
                                                </option>
                                            @empty
                                                <option selected>Aucune classe</option>
                                            @endforelse
                                        </select>
                                        @error('classe')
                                            <small id="helpId" class="form-text text-danger"> {{ $errors->first('classe') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cours" class="form-label">Cours</label>
                                        <select class="form-select" @error('cours') is-invalid @enderror" name="cours"
                                            id="cours" required>
                                            @forelse ($cours as $cour)
                                                <option value="{{ $cour->id }}">{{ $cour->name }} (
                                                    {{ $cour->classe->libelle }} )
                                                </option>
                                            @empty
                                                <option selected>Aucun cours</option>
                                            @endforelse
                                        </select>
                                        @error('cours')
                                            <small id="helpId" class="form-text text-danger"> {{ $errors->first('cours') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Commentaire</label>
                                <textarea class="ckeditor form-control" @error('description') is-invalid @enderror" name="description">
                                            {{ $document->description }}
                                        </textarea>
                                @error('description')
                                    <small id="helpId" class="form-text text-danger">
                                        {{ $errors->first('description') }}
                                    </small>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-outline-primary btn-block">
                                        Modifier
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
