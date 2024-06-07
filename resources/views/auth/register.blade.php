@extends('layouts.auth.app')

@section('content')
    <div class="card mx-auto shadow-lg" style="max-width: 500px;">
        <div class="card-body">
            <div class="m-sm-4">
                <div class="text-center my-5">
                    <img src="{{ asset('assets/img/unnamed.png') }}" alt="Overall Colombia Logo" style="width: 100px;">
                    <h2 class="mb-1">Crea tu cuenta</h2>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <input id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror rounded-pill" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">
                        @error('name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror rounded-pill" name="email"
                            value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico">
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror rounded-pill" name="password"
                            required autocomplete="new-password" placeholder="Contraseña">
                        @error('password')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input id="password-confirm" type="password" class="form-control rounded-pill"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Confirmar contraseña">
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                            Crear cuenta
                        </button>
                    </div>

                    <div class="text-center">
                        <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-primary">Inicia sesión
                                aquí</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
