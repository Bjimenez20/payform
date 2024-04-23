<nav class="navbar navbar-expand navbar-light navbar-bg">
    <div class="row">
        <div class="col mx-4">
            <div class="row">
                <div class="col-auto">
                    <span class="fs-1 text-personality fw-bold">PSP</span>
                </div>
                <div class="col-auto mx-0 px-0">
                    <span class="fs-1 text-personality fw-bold">|</span>
                </div>
                <div class="col-auto"><span class="text-personality fw-bold">Programa seguimiento de <br> pacientes</span></div>
            </div>
        </div>
    </div>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown d-flex align-items-center me-2">
                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative">
                        <span class="iconify" data-icon="noto:bell"></span>
                        <span class="indicator">0</span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                    <div class="dropdown-menu-header">
                        0 Notificaciones nuevas
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <i class="text-danger" data-feather="alert-circle"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">Sin notificaciones</div>
                                    <div class="text-muted small mt-1">No hay notificaciones</div>
                                    <div class="text-muted small mt-1">0</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="#" class="text-muted">Ver todas las notificaciones</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="{{ Auth::user()->getMedia('profiles')->last()? Auth::user()->getMedia('profiles')->last()->getUrl(): 'https://img.freepik.com/vector-premium/icono-circulo-usuario-anonimo-ilustracion-vector-estilo-plano-sombra_520826-1931.jpg' }}"
                        alt="Descripción de la imagen" class="rounded-circle" width="50" height="50">
                    <span class="text-dark fw-bold mx-2">{{ Auth::user()->name . ' ' . Auth::user()->last_name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
                            data-feather="user"></i> Mi perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i>
                        Administración</a>
                    <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i>
                        Centro de ayuda</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="log-out"></i>
                        Cerrar sesión</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
