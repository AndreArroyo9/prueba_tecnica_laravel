<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUnderlineExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="/images/bootstrap-logo.svg" width="36" /></a>
        <div class="collapse navbar-collapse " id="navbarUnderlineExample">
            <ul class="navbar-nav navbar-nav-underline">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Panel de administrador</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Servicios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/admin/privados">Privados</a>
                        <a class="dropdown-item" href="/admin/publicos">Públicos</a>

                    </div>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center ms-auto">
            @guest
                <a href="/login" type="button" class="btn btn-light px-3 me-2 mr-2">
                    Iniciar sesión
                </a>
                <a href="/register" type="button" class="btn btn-primary me-3">
                    Registrarse
                </a>
            @endguest
            @auth
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="btn btn-light me-3">
                        Cerrar sesión
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>
