<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Soluciones online</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>



</head>

<body class="p-3">
    <x-nav-bar></x-nav-bar>
    <main class="container my-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">Bienvenido a Soluciones Online</h1>
            <p class="lead">En Soluciones Online puedes compartir y encontrar una amplia variedad de servicios, desde clases de piano hasta asesoramiento profesional. Regístrate para comenzar a publicar tus propios servicios o navega por los servicios ofrecidos por otros usuarios.</p>
            <a href="/register" class="btn btn-primary btn-lg">Regístrate ahora y comienza a publicar tus servicios</a>
            <a href="/servicios" class="btn btn-secondary btn-lg">Explorar Servicios</a>
        </div>

        <section class="my-5">
            <h2 class="text-center mb-4">¿Por qué elegir Soluciones Online?</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Fácil de Usar</h5>
                            <p class="card-text">Publica y gestiona tus servicios con unos pocos clics.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Comunidad Activa</h5>
                            <p class="card-text">Descubre servicios ofrecidos por usuarios de todo el mundo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Control Total</h5>
                            <p class="card-text">Administra tus servicios, actualiza información y controla su estado.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
