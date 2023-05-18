@extends('layouts.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Veuillez vous authentifier</h2>
        </div>
    </div><!-- End Breadcrumbs -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-md-6 pt-5 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <form action="{{ route('login') }}" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Addresse Email') }}</label>
                            <input type="email" name="email" class="form-control" @error('email') is-invalid @enderror"
                                id="email" required value="{{ old('email') }}" autocomplete="email" autofocus>
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Mot de passe') }}</label>
                            <input type="password" class="form-control" name="password" id="password" required
                                @error('password') is-invalid @enderror" autocomplete="current-password">
                            @error('password')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié?') }}
                            </a>
                        @endif
                        <div class="text-center"><button type="submit">{{ __('Connexion') }}</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
@endsection
