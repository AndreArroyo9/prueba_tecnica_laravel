<x-admin-layout>
    <x-slot:heading>
        Panel de administrador
    </x-slot:heading>
    <x-slot:text>
        Aquí están todos los servicios (públicos y privados).
    </x-slot:text>

    @foreach($servicios as $servicio)
        <x-servicio-card>
            <x-slot:image>{{ \Illuminate\Support\Facades\Storage::url($servicio->image) }}</x-slot:image>

            <x-slot:title>{{ $servicio->title }}</x-slot:title>

            <x-slot:price>{{ $servicio->price }}</x-slot:price>

            <x-slot:info>
                @if($servicio->status)
                    Estado: Público
                @else
                    Estado: Privado
                @endif
            </x-slot:info>

            <x-slot:id>{{ $servicio->id }}/edit</x-slot:id>

            <x-slot:textButton>Modificar servicio</x-slot:textButton>
        </x-servicio-card>
    @endforeach

</x-admin-layout>
