@extends('layouts.dashboard.app')
@section('content')
    <div class="row-reverse">
        <div class="card card-body">
            <div class="text d-flex justify-content-center">
                <h1>PayForm</h1>
            </div>
            <div class="col mb-5">
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('login') }}" class="btn btn-lg btn-primary rounded-5">VER
                        PAGO</a>
                </div>
                <form id="payments">
                    <div class="col mb-4">
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-bold mb-2">TIPO DE PAGO <span
                                        class="text-danger fw-bold">*</span></label>
                                <select name="payment_type" id="payment_type" class="form-control"
                                    data-title="Tipo de pago">
                                    <option value="">Seleccione...</option>
                                    @foreach ($payments_type as $payment_type)
                                        <option value="{{ $payment_type->id }}">{{ $payment_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="" class="fw-bold mb-2">NOMBRE DEL PAGO<span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="text" name="payment_name" id="payment_name" class="form-control"
                                    data-title="Nombre del pago">
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-bold mb-2">ADJUNTAR ARCHIVO<span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="file" class="form-control form-control-lg" name="archivo" id="archivo"
                                    data-title="Archivo">
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-bold mb-2">CORREO SOLICITANTE<span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="email" name="email" id="email" class="form-control"
                                    data-title="Correo Solicitante">
                            </div>
                            <div class="col">
                                <label for="" class="fw-bold mb-2">FECHA DE PAGO<span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="date" name="payment_date" id="payment_date" class="form-control"
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
                                    data-title="Fecha de Creación" value="{{ $date }}" readonly>
                            </div>
                            <div class="col">
                                <label for="" class="fw-bold mb-2">MONTO APROXIMADO<span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="number" name="approximate_amounte" id="approximate_amounte"
                                    class="form-control" data-title="Monto Aproximado">
                            </div>
                        </div>
                    </div>
                    <!-- PSE y PORTALES -->
                    <div class="col mb-4">
                        <div class="row">
                            <div class="col d-none" id="option_payment_link_pse_portals">
                                <label for="" class="fw-bold mb-2">LINK DE PAGO <span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="text" name="payment_link" id="payment_link" class="form-control"
                                    data-title="Link de Pago">
                            </div>
                            <div class="col d-none" id="option_reference_id_pse_portals">
                                <label for="" class="fw-bold mb-2">ID DE REFERENCIA <span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="text" name="reference_id" id="reference_id" class="form-control"
                                    data-title="Id de Referencia">
                            </div>
                        </div>
                    </div>
                    <!-- PORTALES -->
                    <div class="col mb-4">
                        <div class="row">
                            <div class="col d-none" id="option_user_portals">
                                <label for="" class="fw-bold mb-2">USUARIO <span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="text" name="user" id="user" class="form-control"
                                    data-title="Usuario">
                            </div>
                            <div class="col d-none" id="option_password_portals">
                                <label for="" class="fw-bold mb-2">CONTRASEÑA <span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="text" name="password" id="password" class="form-control"
                                    data-title="Contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="col bm-4">
                        <div class="row">
                            <div class="col d-none" id="option_payment_instructions_pse_portals">
                                <label for="" class="fw-bold mb-2">INSTRUCCIONES DE PAGO <span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="text" name="payment_instructions" id="payment_instructions"
                                    class="form-control" data-title="Instrucciones de Pago">
                            </div>
                        </div>
                    </div>
                    <!-- URGENTES -->
                    <div class="d-none" id="option_urgentes">
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">NÚMERO CUENTA <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="account_number" id="account_number" class="form-control"
                                        data-title="Número Cuenta">
                                </div>
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">BANCO DE LA CUENTA <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="account_bank" id="account_bank" class="form-control"
                                        data-title="Banco de la Cuenta">
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">CEDULA DE QUIEN RECIBE <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="number" name="identification" id="identification" class="form-control"
                                        data-title="Cedula de quien recibe">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- VUELOS -->
                    <div class="col d-none" id="option_vuelo">
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">LINK AEROLÍNEA <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="airline_link" id="airline_link" class="form-control"
                                        data-title="Link Aerolínea">
                                </div>
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">TIPO DE VUELO <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="flight_type" id="flight_type" class="form-control"
                                        data-title="Tipo de Vuelo">
                                        <option value="">Seleccione...</option>
                                        @foreach ($type_filghts as $type_filght)
                                            <option value="{{ $type_filght->id }}">{{ $type_filght->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4 d-none" id="vuelo_ida">
                            <h3 class="d-flex justify-content-center">Datos vuelo ida</h3>
                            <div class="col mb-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">CIUDAD ORIGEN IDA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="city_origin" id="city_origin" class="form-control"
                                            data-title="Ciudad Origen Ida">
                                    </div>
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">CIUDAD DESTINO IDA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="destination_city" id="destination_city"
                                            class="form-control" data-title="Ciudad Destino Ida">
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">FECHA DE IDA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="departure_date" id="departure_date"
                                            class="form-control" data-title="Fecha de Ida">
                                    </div>
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">HORARIO VUELO IDA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="outeard_flight_schedule" id="outeard_flight_schedule"
                                            class="form-control" data-title="Horario Vuelo Ida">
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">OBSERVACIONES IDA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <textarea name="ida_observation" id="ida_observation" cols="10" rows="5" class="form-control"
                                            data-title="Observaciones Ida"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4 d-none" id="vuelo_vuelta">
                            <h3 class="d-flex justify-content-center">Datos vuelo vuelta</h3>
                            <div class="col mb-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">CIUDAD ORIGEN VUELTA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="city_origin_return" id="city_origin_return"
                                            class="form-control" data-title="Ciudad Origen Vuelta">
                                    </div>
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">CIUDAD DESTINO VUELTA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="city_destination_return" id="city_destination_return"
                                            class="form-control" data-title="Ciudad Destino Vuelta">
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">FECHA DE VUELTA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="return_date" id="return_date" class="form-control"
                                            data-title="Fecha de Vuelta">
                                    </div>
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">HORARIO VUELO VUELTA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="return_flight_schedule" id="return_flight_schedule"
                                            class="form-control" data-title="Horario Vuelo Vuelta">
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">OBSERVACIONES VUELTA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <textarea name="return_observation" id="return_observation" cols="10" rows="5" class="form-control"
                                            data-title="Observaciones Vuelta"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col my-5 d-flex justify-content-center">
                        <button type="button" class="btn btn-lg btn-primary  rounded-5" id="btnSubmitCreate">GUARDAR</button>
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
