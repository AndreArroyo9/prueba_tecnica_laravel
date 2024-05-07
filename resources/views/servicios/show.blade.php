<x-layout>
    <x-slot:heading>{{ $servicio->title }}</x-slot>
        <main class="w-auto mt-5">
            <div class="w-75 m-auto container">
                <div class="row">
                    <div class="col-8 d-flex flex-column px-5">
                        <h1 class="pb-3">{{ $servicio->title }}</h1>
                        <img src="{{ $servicio->image }}" class="img-fluid pb-3" alt="...">
                        <h2 class="pb-3">Acerca de este servicio</h2>
                        <p class="pb-3">{{ $servicio->description }}</p>
                    </div>
                    <div class="col d-flex flex-column pt-3">
                        <p class="text-justify">Precio: {{ $servicio->price }} €</p>
                        <button type="button" class="btn btn-primary w-100">Contacta conmigo</button>
                        <p class="pt-3">Info usuario</p>
                    </div>
                </div>
            </div>
        </main>
</x-layout>