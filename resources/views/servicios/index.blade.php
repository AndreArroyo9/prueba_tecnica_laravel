<x-servicios-layout>
    <x-slot:heading>Servicios</x-slot:heading>
    <main class="w-auto">
        <div class="w-75 m-auto">
            <div class="d-flex flex-wrap justify-content-center align-items-center">
                @foreach($servicios as $servicio)
                    <div class="card mx-auto mb-3" style="width: 18rem;">
                        <img src="{{ $servicio->image }}" class="card-img-top" alt="...">
                        <div class="card-img-overlay">
                            <h4 class="card-title">{{ $servicio->title }}</h4>
                            <h5 class="card-subtitle">{{ $servicio->price }} €</h5>
                            <p class="card-text">prueba</p>
                            <a href="#" class="btn btn-primary">More...</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</x-servicios-layout>