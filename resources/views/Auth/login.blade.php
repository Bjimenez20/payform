@extends('layouts.auth.app')
@section('content')
    <div class="card rounded-5 shadow-lg">
        <div class="card-body">
            <div class="m-sm-3">
                <div class="row mt-5">
                    <div class="col">
                        <img src="{{ asset('assets/img/sanofi+overall.png') }}" alt="" class="w-100 mb-5">
                    </div>
                </div>
                <form action="{{ route('login.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label h4 fw-bold">Correo electrónico</label>
                        <input class="form-control form-control-lg rounded-5" type="email" name="email"
                            placeholder="Ingresa tu correo electrónico" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label h4 fw-bold">Contraseña</label>
                        <input class="form-control form-control-lg rounded-5" type="password" name="password"
                            placeholder="Ingresa tu contraseña" />
                        <div class="row">
                            <div class="col d-flex justify-content-end">
                                <a href="pages-sign-up.html">
                                    <p class="text-right">¿Olvidaste tu contraseña?</p>
                                </a>
                            </div>
                        </div>
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
