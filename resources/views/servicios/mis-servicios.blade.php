<x-servicios-layout>
    <x-slot:heading>
        Mis servicios
    </x-slot:heading>
    @foreach($misServicios as $servicio)
        <div class="card mx-auto mb-3" style="width: 18rem;">
            <img src="{{ $servicio->image }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title">{{ $servicio->title }}</h4>
                <h5 class="card-subtitle">{{ $servicio->price }} €</h5>
                <p class="card-text">prueba</p>
                <a href="/servicios/{{ $servicio->id }}" class="btn btn-primary">Ver servicio</a>
            </div>
        </div>
    @endforeach
</x-servicios-layout>