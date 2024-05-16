@extends('layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <h2 class="fw-bold">Listado de pagos</h2>
                        </div>
                        <div class="col text-end">
                            <!-- Botón de cierre de sesión -->
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                            </form>
                        </div>
                    </div>
                    <div class="row-reverse" id="list">
                        <div class="col mb-5 table-responsive">
                            <table class="table table-hover" id="listPayform">
                                <thead class="bg-table-head  text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">TIPO DE PAGO</th>
                                        <th scope="col">FECHA DE PAGO</th>
                                        <th scope="col">FECHA DE CREACIÓN</th>
                                        <th scope="col">ARCHIVO</th>
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

    <!-- Modal para mostrar el archivo -->
    <div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileModalLabel">Archivo</h5>
                </div>
                <div class="modal-body">
                    <iframe id="fileFrame" src="" frameborder="0" style="width: 100%; height: 400px;"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
