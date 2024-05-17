@extends('layouts.dashboard.app')
@section('content')
    <div class="row-reverse">
        <div class="card card-body shadow">
            <h1 class="h1">PayForm</h1>
            <div class="col mb-5">
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-5">VER
                        PAGO</a>
                </div>
                <form id="payments">
                    <div class="row-reverse">
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">TIPO DE PAGO <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="payment_type" id="payment_type" class="form-control" data-title="Tipo de pago">
                                        <option value="">Seleccione...</option>
                                        @foreach ($type_payments as $type_payment)
                                            <option value="{{ $type_payment->id }}">{{ $type_payment->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">NOMBRE DEL PAGO<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="pay_name" id="pay_name" class="form-control"
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
                                        data-title="Documento">
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">CORREO SOLICITANTE<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="email" name="email" id="email"
                                        class="form-control" data-title="Correo Solicitante">
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
                                    <input type="number" name="approximate_amounte" id="approximate_amounte" class="form-control"
                                        data-title="Monto Aproximado">
                                </div>
                            </div>
                        </div>
                        <!-- PSE y PORTALES -->
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col d-none" id="option_pay_link_pse_portals">
                                    <label for="" class="fw-bold mb-2">LINK DE PAGO <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="pay_link" id="pay_link" class="form-control"
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
                                <div class="col d-none" id="option_pay_instructions_pse_portals">
                                    <label for="" class="fw-bold mb-2">INSTRUCCIONES DE PAGO <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="pay_instructions" id="pay_instructions"
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
                                        <input type="text" name="account_number" id="account_number"
                                            class="form-control" data-title="Número Cuenta">
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
                                        <input type="text" name="id_card" id="id_card" class="form-control"
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
                                        <select name="type_flight" id="type_flight" class="form-control"
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
                                            <input type="text" name="city_origin" id="city_origin"
                                                class="form-control" data-title="Ciudad Origen Ida">
                                        </div>
                                        <div class="col">
                                            <label for="" class="fw-bold mb-2">CIUDAD DESTINO IDA <span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" name="city_destination" id="city_destination"
                                                class="form-control" data-title="Ciudad Destino Ida">
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="row">
                                        <div class="col">
                                            <label for="" class="fw-bold mb-2">FECHA DE IDA <span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" name="date_departure" id="date_departure"
                                                class="form-control" data-title="Fecha de Ida">
                                        </div>
                                        <div class="col">
                                            <label for="" class="fw-bold mb-2">HORARIO VUELO IDA <span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" name="one_way_time" id="one_way_time"
                                                class="form-control" data-title="Horario Vuelo Ida">
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="row">
                                        <div class="col">
                                            <label for="" class="fw-bold mb-2">OBSERVACIONES IDA <span
                                                    class="text-danger fw-bold">*</span></label>
                                            <textarea name="departure_observation" id="departure_observation" cols="10" rows="5"
                                                class="form-control" data-title="Observaciones Ida"></textarea>
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
                                            <input type="text" name="city_destination_return"
                                                id="city_destination_return" class="form-control"
                                                data-title="Ciudad Destino Vuelta">
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="row">
                                        <div class="col">
                                            <label for="" class="fw-bold mb-2">FECHA DE VUELTA <span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" name="date_return" id="date_return"
                                                class="form-control" data-title="Fecha de Vuelta">
                                        </div>
                                        <div class="col">
                                            <label for="" class="fw-bold mb-2">HORARIO VUELO VUELTA <span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" name="time_return" id="time_return"
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
                            <button type="button" class="btn btn-primary  rounded-5"
                                id="btnSubmitCreate">GUARDAR</button>
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
