<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="javascript:;">
            <div class="row-reverse">
                <div class="col d-flex justify-content-center my-5">
                    <img src="{{ asset('assets/img/logo-dark.png') }}" alt="" class="w-75">
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <span class="iconify me-1 text-dark" data-icon="carbon:enterprise" data-width="20"></span>
                    <small class="text-dark fw-bold">ADMINISTRACIÓN</small>
                </div>
            </div>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menú
            </li>

            <li class="sidebar-item {{ request()->is('administration/home') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('administration.home') }}">
                    <span class="iconify" data-icon="solar:home-bold-duotone" data-width="25"></span> <span
                        class="align-middle">Inicio</span>
                </a>
            </li>

            <li
                class="sidebar-item 
            {{ request()->is(
                'administration/administration',
                'administration/users',
                'administration/users/*',
                'administration/roles',
                'administration/roles/*',
                'administration/products',
                'administration/products/*',
                'administration/doses',
                'administration/doses/*',
                'administration/pathological_classification',
                'administration/pathological_classification/*',
                'administration/consents',
                'administration/consents/*',
                'administration/emails',
                'administration/emails/*',
            )
                ? 'active'
                : '' }}">
                <a class="sidebar-link" href="{{ route('administration.administration.index') }}">
                    <span class="iconify" data-icon="icon-park-solid:database-config" data-width="25"></span> <span
                        class="align-middle">Administración</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('administration.reports.index') }}">
                    <span class="iconify" data-icon="solar:chart-bold-duotone" data-width="25"></span> <span
                        class="align-middle">Reportes</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('initial') }}">
                    <span class="iconify" data-icon="uiw:global" data-width="25"></span> <span
                        class="align-middle">Pantalla inicial</span>
                </a>
            </li>

            <li class="sidebar-item">
                <form action="{{ route('logout') }}" method="post" id="logout-form">
                    @csrf
                    <a class="sidebar-link" href="javascript:;" id="logout-link">
                        <span class="iconify" data-icon="solar:logout-3-bold-duotone" data-width="25"></span> <span
                            class="align-middle">Cerrar sesión</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</nav>

<script>
    const logoutLink = document.getElementById('logout-link');
    const logoutForm = document.getElementById('logout-form');

    logoutLink.addEventListener('click', () => {
        localStorage.removeItem('modalOpened');
        logoutForm.submit();
    });
</script>
