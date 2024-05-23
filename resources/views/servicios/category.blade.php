<x-servicios-layout>
    <x-slot:heading>Servicios de {{ $category }}</x-slot:heading>
    <x-slot:text>
        @if($servicios->isEmpty())
            Actualmente ningún usuario ofrece servicios de este tipo.
        @else
            Todos los servicios de esta categoría que puedes encontrar en nuestra web.
        @endif
    </x-slot:text>
    @foreach($servicios as $servicio)
        <x-servicio-card>
            <x-slot:image>{{ \Illuminate\Support\Facades\Storage::url($servicio->image) }}</x-slot:image>

            <x-slot:title>{{ $servicio->title }}</x-slot:title>

            <x-slot:price>{{ $servicio->price }}</x-slot:price>

            <x-slot:info>Categoría: {{ $servicio->category }}</x-slot:info>

            <x-slot:id>{{ $servicio->id }}</x-slot:id>

            <x-slot:textButton>Ver servicio</x-slot:textButton>
        </x-servicio-card>
    @endforeach
</x-servicios-layout>
