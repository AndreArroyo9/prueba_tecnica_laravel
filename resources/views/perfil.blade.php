<x-servicios-layout>
    <x-slot:heading>Mi perfil</x-slot:heading>
    <x-slot:text>
        Aquí podrás editar tu perfil y ver los servicios o cursos que has subido a nuestra web.
    </x-slot:text>
        @foreach($servicios as $servicio)
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