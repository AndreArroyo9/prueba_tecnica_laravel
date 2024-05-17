<x-layout>
    <x-slot:heading>{{ $servicio->title }}</x-slot>
        <main class="w-auto mt-5">
            <div class="w-75 m-auto container">
                <div class="row">
                    <div class="col-8 d-flex flex-column px-5">
                        <div class="d-flex flex-row justify-content-between align-items-center mb-3">
                            <h1>{{ $servicio->title }}</h1>

                            @can('modify', $servicio)
                                    <a href="/servicios/{{ $servicio->id }}/edit" class="btn btn-outline-primary mb-3">Editar servicio</a>
                            @endcan

                        </div>
                        <img src="{{ Illuminate\Support\Facades\Storage::url($servicio->image) }}" class="img-fluid pb-3" alt="...">
                        <h2 class="pb-3">Acerca de este servicio</h2>
                        <p class="pb-3">{{ $servicio->description }}</p>
                            @can('hire', $servicio) {{--EL usuario puede contratar el servicio si todavía no lo ha hecho--}}
                                <form method="POST" action="/servicios/{{ $servicio->id }}/contratar">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Contratar servicio</button>
                                </form>
                            @else
                                @cannot('viewChats', $servicio)
                                    <div class="alert alert-success" role="alert">
                                        ¡Servicio contratado!
                                    </div>
                                @endcan
                            @endcan
                    </div>

                    <div class="col d-flex flex-column pt-3">
                        <p class="text-justify">Precio: {{ $servicio->price }} €</p>

                        @can('createChat', $servicio) {{--Solo se pueden crear chats si no existe ninguno, tampoco pueden creadores o admins--}}

                            <form method="POST" action="/servicios/{{ $servicio->id }}/chat/{{ auth()->id() }}">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100">Contacta conmigo</button>
                            </form>

                        @else

                            @cannot('viewChats', $servicio) {{--Los creadores no pueden abrir chats--}}
                                    <a href="/servicios/{{ $servicio->id }}/chat/{{ auth()->id() }}" class="btn btn-primary w-100">Abrir chat</a>
                            @endcannot

                        @endcan

                        <p class="pt-3">Info usuario</p>
                        @can('viewChats', $servicio) {{--Solo el creador puede ver este apartado--}}
                            @isset($chats)
                                <h3 class="mb-3">Chats de este servicio</h3>
                           @endisset
                            <div class="list-group">
                                @foreach($servicio->chats as $chat)
                                    <x-chat-item href="/servicios/{{ $servicio->id }}/chat/{{ $chat->user_id }}">
                                        <x-slot:nombre>{{ $chat->user->name }}</x-slot:nombre>
                                        <x-slot:ultimoMensaje></x-slot:ultimoMensaje>
                                    </x-chat-item>
                                @endforeach
                            </div>
                        @endcan

                    </div>
                </div>
            </div>
        </main>
</x-layout>
