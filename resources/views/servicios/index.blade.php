<x-servicios-layout>
    <x-slot:heading>Servicios</x-slot:heading>
    <x-slot:text>
        Todos los servicios que puedes encontrar en nuestra web.
    </x-slot:text>
    @foreach($servicios as $servicio)
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
