<x-servicios-layout>
    <x-slot:heading>Mi perfil</x-slot:heading>
    @if($servicios->isEmpty())
        <x-slot:text>
            Aquí podrás editar tu perfil. Si creas un servicio, aparecerá en esta página.
        </x-slot:text>
    @else
        <x-slot:text>
            Aquí podrás editar tu perfil y ver los servicios o cursos que has subido a nuestra web.
        </x-slot:text>
    @endif
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
