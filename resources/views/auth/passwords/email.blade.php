@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Plus il y a de documents, mieux ça sera.</h2>
        </div>
    </div><!-- End Breadcrumbs -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center contact">
                <div class="col-md-6 pt-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" class="php-email-form">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Addresse Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Envoyer un lien de réinitialisation par mail') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
