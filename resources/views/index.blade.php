@extends('layouts.dashboard.app')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row-reverse" id="list">
                        <div class="col mt-3 mb-5">
                            <div class="row">
                                <div class="col">
                                    <h2 class="fw-bold">Listado de pagos</h2>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <a href="{{ route('create') }}" class="btn btn-primary rounded-5">REGISTRAR
                                        PAGO</a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-5 table-responsive">
                            <table class="table table-hover" id="listPayform">
                                <thead class="bg-table-head  text-white">
                                    <tr>
                                        <th scope="col">TIPO DE PAGO</th>
                                        <th scope="col">FECHA DE PAGO</th>
                                        <th scope="col">FECHA DE CREACIÓN</th>
                                        <th scope="col">ACCIÓN</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var listUrl = "{{ route('list') }}"
        var showUrl = "{{ route('show', ':id') }}"
        var editUrl = "{{ route('edit', ':id') }}"
        var deleteUrl = "{{ route('delete', ':id') }}"
    </script>

    @vite('resources/js/modules/List.js')
@endsection
