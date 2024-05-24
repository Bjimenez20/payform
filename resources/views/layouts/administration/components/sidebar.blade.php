<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ URL::to('/') }}">
            <img src="https://i.ibb.co/2MHZnbK/Logo-Overall.png" alt="" class="w-100">
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menú
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('home') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Pagos</span>
                </a>
            </li>

            <li class="sidebar-header">
                Opciones
            </li>

            {{-- <li class="sidebar-item {{ request()->is('administration/users') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('administration.users.index') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Usuarios</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('administration/profiles') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('administration.profiles.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Mi perfil</span>
                </a>
            </li> --}}

            <li class="sidebar-item">
                <form action="{{ route('logout') }}" method="post" id="logout-form">
                    @csrf
                    <a class="sidebar-link" href="javascript:;" id="logout-link">
                        <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Cerrar
                            sesión</span>
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
