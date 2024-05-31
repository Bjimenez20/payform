@extends('layouts.administration.app')
@section('content')
    <div class="row-reverse">
        <div class="card card-body shadow">
            <div class="col mt-3 mb-5">
                <div class="row">
                    <div class="col">
                        <h2 class="fw-bold">Actualizar Pago</h2>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="{{ route('home') }}" class="btn btn-primary  rounded-5">
                            <svg width="50" height="16" viewBox="0 0 50 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 8H2M5 11L2 8L5 5" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <text x="16" y="12" fill="currentColor" font-family="Arial, sans-serif"
                                    font-size="12">Atras</text>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <form id="formUpdate">
                    <div class="row-reverse">
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                                    <label for="" class="fw-bold mb-2">TIPO DE PAGO <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="payment_type" id="payment_type" class="form-control"
                                        data-title="Tipo de pago">
                                        <option value="{{ $data->payment_type }}"> {{ $data->type_payment->name }}</option>
                                        @foreach ($payments_type as $payment_type)
                                            <option value="{{ $payment_type->id }}">
                                                {{ $payment_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">ESTADO DEL PAGO <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="payment_state" id="payment_state" class="form-control"
                                        data-title="Tipo de pago">
                                        <option value="{{ $data->state_id }}"> {{ $data->payment_state->name }}</option>
                                        @foreach ($payments_states as $payment_states)
                                            <option value="{{ $payment_states->id }}">
                                                {{ $payment_states->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">NOMBRE DEL PAGO<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="payment_name" id="payment_name"
                                        value="{{ $data->payment_name }}" class="form-control"
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
                                    <input type="email" name="email" id="email" value="{{ $data->email }}"
                                        class="form-control" data-title="Correo Solicitante">
                                </div>
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">FECHA DE PAGO<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="date" name="payment_date" id="payment_date"
                                        value="{{ $data->payment_date }}" class="form-control" data-title="Fecha de Pago">
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">FECHA DE CREACIÓN<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="fecha_creacion" id="fecha_creacion" class="form-control"
                                        data-title="Fecha de Creación" value="{{ $data->created_at }}" readonly>
                                </div>
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">MONTO APROXIMADO<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="number" name="approximate_amounte" id="approximate_amounte"
                                        value="{{ $data->approximate_amounte }}" class="form-control"
                                        data-title="Monto Aproximado">
                                </div>
                            </div>
                        </div>
                        <!-- PSE y PORTALES -->
                        @if ($data->type_payment->id == 3 || $data->type_payment->id == 5)
                            <div class="col mb-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">LINK DE PAGO <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="payment_link" id="payment_link"
                                            value="{{ $data->payment_link }}" class="form-control"
                                            data-title="Link de Pago">
                                    </div>
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">ID DE REFERENCIA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="reference_id" id="reference_id"
                                            value="{{ $data->reference }}" class="form-control"
                                            data-title="Id de Referencia">
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- PORTALES -->
                        @if ($data->type_payment->id == 5)
                            <div class="col mb-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">USUARIO <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="user" id="user" value="{{ $data->user }}"
                                            class="form-control" data-title="Usuario">
                                    </div>
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">CONTRASEÑA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="password" id="password"
                                            value="{{ $data->password }}" class="form-control" data-title="Contraseña">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($data->type_payment->id == 3 || $data->type_payment->id == 5)
                            <div class="col bm-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">INSTRUCCIONES DE PAGO <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="payment_instructions" id="payment_instructions"
                                            value="{{ $data->payment_instruction }}" class="form-control"
                                            data-title="Instrucciones de Pago">
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- URGENTES -->
                        @if ($data->type_payment->id == 6)
                            <div class="col mb-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">NÚMERO CUENTA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="account_number" id="account_number"
                                            value="{{ $data->account_number }}" class="form-control"
                                            data-title="Número Cuenta">
                                    </div>
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">BANCO DE LA CUENTA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="account_bank" id="account_bank"
                                            value="{{ $data->account_bank }}" class="form-control"
                                            data-title="Banco de la Cuenta">
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">CEDULA DE QUIEN RECIBE <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="number" name="identification" id="identification"
                                            value="{{ $data->identification }}" class="form-control"
                                            data-title="Cedula de quien recibe">
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- VUELOS -->
                        @if ($data->type_payment->id == 4)
                            <div class="col mb-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">LINK AEROLÍNEA <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="airline_link" id="airline_link"
                                            value="{{ $data->airline_link }}" class="form-control"
                                            data-title="Link Aerolínea">
                                    </div>
                                    <div class="col">
                                        <label for="" class="fw-bold mb-2">TIPO DE VUELO <span
                                                class="text-danger fw-bold">*</span></label>
                                        <select name="flight_type" id="flight_type" class="form-control"
                                            data-title="Tipo de Vuelo">
                                            <option value="{{ $data->flight_type }}"> {{ $data->type_flight->name }}
                                            </option>
                                            @foreach ($filghts_type as $flight_type)
                                                <option value="{{ $flight_type->id }}">
                                                    {{ $flight_type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- id & vuelta -->
                        @if ($data->flight_type == 1)
                            <div class="row">
                                <div class="col mb-4">
                                    <h3 class="d-flex justify-content-center">Datos vuelo ida</h3>
                                    <div class="col mb-4">
                                        <div class="row">
                                            <div class="col">
                                                <label for="" class="fw-bold mb-2">CIUDAD ORIGEN IDA <span
                                                        class="text-danger fw-bold">*</span></label>
                                                <input type="text" name="city_origin" id="city_origin"
                                                    value="{{ $data->city_origin }}" class="form-control"
                                                    data-title="Ciudad Origen Ida">
                                            </div>
                                            <div class="col">
                                                <label for="" class="fw-bold mb-2">CIUDAD DESTINO IDA <span
                                                        class="text-danger fw-bold">*</span></label>
                                                <input type="text" name="destination_city" id="destination_city"
                                                    value="{{ $data->destination_city }}" class="form-control"
                                                    data-title="Ciudad Destino Ida">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-4">
                                        <div class="row">
                                            <div class="col">
                                                <label for="" class="fw-bold mb-2">FECHA DE IDA <span
                                                        class="text-danger fw-bold">*</span></label>
                                                <input type="text" name="departure_date" id="departure_date"
                                                    value="{{ $data->departure_date }}" class="form-control"
                                                    data-title="Fecha de Ida">
                                            </div>
                                            <div class="col">
                                                <label for="" class="fw-bold mb-2">HORARIO VUELO IDA <span
                                                        class="text-danger fw-bold">*</span></label>
                                                <input type="text" name="outeard_flight_schedule"
                                                    id="outeard_flight_schedule"
                                                    value="{{ $data->outeard_flight_schedule }}" class="form-control"
                                                    data-title="Horario Vuelo Ida">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-4">
                                        <div class="row">
                                            <div class="col">
                                                <label for="" class="fw-bold mb-2">OBSERVACIONES IDA <span
                                                        class="text-danger fw-bold">*</span></label>
                                                <textarea name="ida_observation" id="ida_observation" cols="10" rows="5" class="form-control"
                                                    data-title="Observaciones Ida">{{ $data->ida_observation }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <h3 class="d-flex justify-content-center">Datos vuelo vuelta</h3>
                                    <div class="col mb-4">
                                        <div class="row">
                                            <div class="col">
                                                <label for="" class="fw-bold mb-2">CIUDAD ORIGEN VUELTA <span
                                                        class="text-danger fw-bold">*</span></label>
                                                <input type="text" name="city_origin_return" id="city_origin_return"
                                                    value="{{ $data->city_origin_return }}" class="form-control"
                                                    data-title="Ciudad Origen Vuelta">
                                            </div>
                                            <div class="col">
                                                <label for="" class="fw-bold mb-2">CIUDAD DESTINO VUELTA <span
                                                        class="text-danger fw-bold">*</span></label>
                                                <input type="text" name="city_destination_return"
                                                    id="city_destination_return"
                                                    value="{{ $data->city_destination_return }}" class="form-control"
                                                    data-title="Ciudad Destino Vuelta">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-4">
                                        <div class="row">
                                            <div class="col">
                                                <label for="" class="fw-bold mb-2">FECHA DE VUELTA <span
                                                        class="text-danger fw-bold">*</span></label>
                                                <input type="text" name="return_date" id="return_date"
                                                    value="{{ $data->return_date }}" class="form-control"
                                                    data-title="Fecha de Vuelta">
                                            </div>
                                            <div class="col">
                                                <label for="" class="fw-bold mb-2">HORARIO VUELO VUELTA <span
                                                        class="text-danger fw-bold">*</span></label>
                                                <input type="text" name="return_flight_schedule"
                                                    id="return_flight_schedule"
                                                    value="{{ $data->return_flight_schedule }}" class="form-control"
                                                    data-title="Horario Vuelo Vuelta">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-4">
                                        <div class="row">
                                            <div class="col">
                                                <label for="" class="fw-bold mb-2">OBSERVACIONES VUELTA <span
                                                        class="text-danger fw-bold">*</span></label>
                                                <textarea name="return_observation" id="return_observation" cols="10" rows="5" class="form-control"
                                                    data-title="Observaciones Vuelta">{{ $data->return_observation }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- solo ida -->
                        @if ($data->flight_type == 2)
                            <div class="col mb-4">
                                <h3 class="d-flex justify-content-center">Datos vuelo ida</h3>
                                <div class="col mb-4">
                                    <div class="row">
                                        <div class="col">
                                            <label for="" class="fw-bold mb-2">CIUDAD ORIGEN IDA <span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" name="city_origin" id="city_origin"
                                                value="{{ $data->city_origin }}" class="form-control"
                                                data-title="Ciudad Origen Ida">
                                        </div>
                                        <div class="col">
                                            <label for="" class="fw-bold mb-2">CIUDAD DESTINO IDA <span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" name="destination_city" id="destination_city"
                                                value="{{ $data->destination_city }}" class="form-control"
                                                data-title="Ciudad Destino Ida">
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="row">
                                        <div class="col">
                                            <label for="" class="fw-bold mb-2">FECHA DE IDA <span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" name="departure_date" id="departure_date"
                                                value="{{ $data->departure_date }}" class="form-control"
                                                data-title="Fecha de Ida">
                                        </div>
                                        <div class="col">
                                            <label for="" class="fw-bold mb-2">HORARIO VUELO IDA <span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" name="outeard_flight_schedule"
                                                id="outeard_flight_schedule" value="{{ $data->outeard_flight_schedule }}"
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
                                                data-title="Observaciones Ida">{{ $data->ida_observation }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col my-5 d-flex justify-content-center">
                            <button type="button" class="btn btn-primary  rounded-5" id="btnSubmitEdit">ACTUALIZAR
                                PAGO</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var dataId = '{{ $data->id }}';
        var updateUrl = "{{ route('update') }}";
    </script>

    @vite('resources/js/modules/Update.js')
@endsection
