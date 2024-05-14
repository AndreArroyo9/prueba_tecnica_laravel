<x-layout>
    <x-slot:heading>{{ $servicio->title }}</x-slot>
        <main class="w-auto mt-5">
            <div class="w-75 m-auto container">
                <div class="row">
                    <div class="col-8 d-flex flex-column px-5">
                        <div class="d-flex flex-row justify-content-between align-items-center mb-3">
                            <h1>{{ $servicio->title }}</h1>
                            @can('edit-servicio', $servicio)
                                <a href="/servicios/{{ $servicio->id }}/edit" class="btn btn-outline-primary mb-3">Editar servicio</a>
                            @endcan
                        </div>
                        <img src="{{ $servicio->image }}" class="img-fluid pb-3" alt="...">
                        <h2 class="pb-3">Acerca de este servicio</h2>
                        <p class="pb-3">{{ $servicio->description }}</p>
                    </div>
                    <div class="col d-flex flex-column pt-3">
                        <p class="text-justify">Precio: {{ $servicio->price }} €</p>
                        <a type="button" class="btn btn-primary w-100" href="/servicios/{{ $servicio->id }}/chat/{{ \Illuminate\Support\Facades\Auth::id() }}">Contacta conmigo</a>
                        <p class="pt-3">Info usuario</p>
                    </div>
                </div>
            </div>
        </main>
</x-layout>
