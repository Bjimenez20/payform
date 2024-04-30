<!DOCTYPE html>
<html lang="en">

@include('layouts.auth.components.head')

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-xs-10 col-sm-10 col-md-6 col-lg-6 col-xl-4 col-xxl-5 d-table h-100">
                    <div class="d-table-cell align-middle">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        body {
            background-image: url('{{asset('assets/img/1.png')}}');
            background-size: cover;
            background-position: top;
        }

        .btn-personality-first {
            background: rgb(24, 96, 240);
            background: linear-gradient(270deg, rgba(24, 96, 240, 1) 35%, rgba(24, 179, 240, 1) 100%);
        }
    </style>

</body>

</html>
