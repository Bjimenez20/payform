@extends('layouts.dashboard.app')
@section('content')
    <div class="row-reverse">
        <div class="card card-body shadow">
            <h1 class="h1">PayForm</h1>
            <div class="col mb-5">
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('login.login') }}" class="btn btn-primary rounded-5">VER
                        PAGO</a>
                </div>
                <form id="payments">
                    <div class="row-reverse">
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">TIPO DE PAGO <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="tipo_pago" id="tipo_pago" class="form-control" data-title="Tipo de pago">
                                        <option value="">Seleccione...</option>
                                        @foreach ($type_payments as $type_payment)
                                            <option value="{{ $type_payment->id }}">{{ $type_payment->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">ADJUNTAR ARCHIVO<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="file" class="form-control form-control-lg" name="archivo" id="archivo"
                                        data-title="Adjuntar Archivo">
                                </div>
                            </div>
                        </div>

                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">CORREO SOLICITANTE<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="email" name="correo_solicitante" id="correo_solicitante"
                                        class="form-control" data-title="Correo Solicitante">
                                </div>
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">FECHA DE PAGO<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="date" name="fecha_pago" id="fecha_pago" class="form-control"
                                        data-title="Fecha de Pago">
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">FECHA DE CREACIÓN<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control"
                                        data-title="Fecha de Creación" value="{{ $date }}">
                                </div>
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">MONTO APROXIMADO<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="number" name="monto_aprox" id="monto_aprox" class="form-control"
                                        data-title="Monto Aproximado">
                                </div>
                            </div>
                        </div>
                        <div class="col my-5 d-flex justify-content-center">
                            <button type="button" class="btn btn-primary  rounded-5" id="btnSubmitCreate">GUARDAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var createUrl = "{{ route('store') }}"
    </script>

    @vite('resources/js/modules/Create.js')
@endsection
