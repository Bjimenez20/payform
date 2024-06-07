@extends('layouts.auth.app')

@section('content')
    <div class="text-center my-5">
        <img src="{{ asset('assets/img/unnamed.png') }}" alt="Overall Colombia Logo" class="w-25 mb-3">
        <h1 class="h2">Bienvenido a Overall Colombia!</h1>
        <p class="lead">
            Por favor ingresa con tus credenciales
        </p>
    </div>

    <div class="card mx-auto shadow-lg" style="max-width: 500px;">
        <div class="card-body">
            <div class="m-sm-4">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Correo electrónico</label>
                        <input id="email" class="form-control form-control-lg rounded-5" type="email" name="email"
                            placeholder="Ingresa tu correo electrónico" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Contraseña</label>
                        <input id="password" class="form-control form-control-lg rounded-5" type="password" name="password"
                            placeholder="Ingresa tu contraseña" required>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger my-4" role="alert">
                            Tus credenciales no son válidas
                        </div>
                    @endif
                    <div class="d-grid gap-2 my-4">
                        <button type="submit" class="btn btn-lg btn-primary rounded-5">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
