<x-servicios-layout>
    <x-slot:heading>Servicios</x-slot:heading>

        <div class="w-75 m-auto">
            <div class="d-flex flex-wrap justify-content-between">
                @foreach($servicios as $servicio)
                    <div class="card mx-auto mb-3" style="width: 18rem;">
                        <img src="{{ $servicio->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{ $servicio->title }}</h4>
                            <h5 class="card-subtitle">{{ $servicio->price }} €</h5>
                            <p class="card-text">prueba</p>
                            <a href="#" class="btn btn-primary">More...</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</x-servicios-layout>