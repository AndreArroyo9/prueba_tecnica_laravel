<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUnderlineExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="/images/bootstrap-logo.svg" width="36" /></a>
        <div class="collapse navbar-collapse " id="navbarUnderlineExample">
            <ul class="navbar-nav navbar-nav-underline">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/servicios" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Explora servicios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/servicios">Todos los servicios</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/servicios">Categoría 1</a>
                        <a class="dropdown-item" href="#">Categoría 2</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Mis servicios</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Perfil</a>
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
            <a class="btn btn-subtle px-3" href="https://github.com/mdbootstrap/mdb-ui-kit" role="button"><i class="fab fa-github"></i></a>
        </div>
    </div>
</nav>