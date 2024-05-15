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
        <x-slot:text2>Aquí están todos los chats en los que participas.</x-slot:text2>
        <x-slot:chats>
            @foreach($chats as $chat)
                <div class="card mx-auto mb-3" style="width: 18rem;">
                    <div class="card-body">
                        <h4 class="card-title">{{ $chat->servicio->creator->user->name }}</h4>
                        <h5 class="card-subtitle">{{ $chat->servicio->title  }}</h5>
                        <p class="card-text">prueba</p>
                        <a href="/servicios/{{ $chat->servicio->id }}/chat/{{ $chat->user_id }}" class="btn btn-primary">Abrir chat</a>
                    </div>
                </div>
            @endforeach
    </x-slot:chats>

</x-servicios-layout>
