<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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
    <div class="w-75 m-auto d-flex flex-row justify-content-between align-items-center">
        <h1 class="text-left mt-5 mb-5 ml-3">{{ $heading }}</h1>
        @auth
                <a href="/servicios/create" class="btn btn-outline-success mr-3">Crear servicio</a>
        @endauth
    </div>
    <div class="w-75 m-auto ">
            <p class="ml-3 mb-5">{{ $text }}</p>
            <div class="d-flex flex-wrap justify-content-between">
                {{ $slot }}
            </div>
    </div>

</body>

</html>
