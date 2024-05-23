<x-servicios-layout>
    <x-slot:heading>
        Mis servicios
    </x-slot:heading>
    @if($misServicios->isEmpty())
        <x-slot:text>No tienes servicios contratados</x-slot:text>
    @else
        <x-slot:text>
            Estos son todos los servicios, cursos o soluciones que has contratado.
        </x-slot:text>
    @endif

    @foreach($misServicios as $servicio)
        <x-servicio-card>
            <x-slot:image>{{ \Illuminate\Support\Facades\Storage::url($servicio->image) }}</x-slot:image>

            <x-slot:title>{{ $servicio->title }}</x-slot:title>

            <x-slot:price>{{ $servicio->price }}</x-slot:price>

            <x-slot:info>{{ $servicio->category }}</x-slot:info>

            <x-slot:id>{{ $servicio->id }}</x-slot:id>

            <x-slot:textButton>Ver servicio</x-slot:textButton>
        </x-servicio-card>
    @endforeach
</x-servicios-layout>
