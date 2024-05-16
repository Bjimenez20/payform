@extends('layouts.auth.app')
@section('content')
    <div class="text-center">
        <img src="https://play-lh.googleusercontent.com/I-y3bgfZja9Qmwd8CLSQ1Zr5ozsmWwN89M1dLHfFvxCjwsmsb23P7PNai_9famqTVBY=w240-h480-rw"
            alt="" class="w-25 mb-3">
        <h1 class="h2">Bienvenido a Overall Colombia!</h1>
        <p class="lead">
            Por favor ingresa con tus credenciales
        </p>
    </div>

    <div class="card">
        <div class="card-body shadow">
            <div class="m-sm-3">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Correo electrónico</label>
                        <input class="form-control form-control-lg rounded-5" type="email" name="email"
                            placeholder="Ingresa tu correo electrónico" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Contraseña</label>
                        <input class="form-control form-control-lg rounded-5" type="password" name="password"
                            placeholder="Ingresa tu contraseña" />
                    </div>
                    @if ($errors->any())
                        <span class="my-5 text-danger fw-bold">Tus credenciales no son válidas</span>
                    @endif
                    <div class="d-grid gap-2 my-5">
                        <button type="submit" class="btn btn-lg btn-primary">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
