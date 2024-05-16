<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

    <title>PayForm</title>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    @vite('resources/js/app.js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="{{ asset('assets/DataTables/DataTables-1.13.4/css/jquery.dataTables.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/DataTables/Buttons-2.3.6/css/buttons.dataTables.css') }}" rel="stylesheet" />

    <script src="{{ asset('assets/DataTables/JSZip-2.5.0/jszip.js') }}"></script>
    <script src="{{ asset('assets/DataTables/pdfmake-0.1.36/pdfmake.js') }}"></script>
    <script src="{{ asset('assets/DataTables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/DataTables/DataTables-1.13.4/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/DataTables/Buttons-2.3.6/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('assets/DataTables/Buttons-2.3.6/js/buttons.colVis.js') }}"></script>
    <script src="{{ asset('assets/DataTables/Buttons-2.3.6/js/buttons.html5.js') }}"></script>
    <script src="{{ asset('assets/DataTables/Buttons-2.3.6/js/buttons.print.js') }}"></script>
    <style>
        body {
            background-image: url('{{ asset('assets/img/1.png') }}');
            background-size: cover;
            background-position: top;
        }

        .btn-personality-first {
            background: rgb(24, 96, 240);
            background: linear-gradient(270deg, rgba(24, 96, 240, 1) 35%, rgba(24, 179, 240, 1) 100%);
        }
    </style>
</head>
