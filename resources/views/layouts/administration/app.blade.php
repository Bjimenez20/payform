<!DOCTYPE html>
<html lang="en">

@include('layouts.administration.components.head')

<body>
    <div class="wrapper">
        @include('layouts.administration.components.sidebar')

        <div class="main">
            @include('layouts.administration.components.navbar')

            <main class="content">
                <div class="container-fluid p-0">

                    @yield('content')

                </div>
            </main>

            @include('layouts.administration.components.footer')
        </div>
    </div>

    @vite('resources/assets/js/app.js')

</body>

</html>
