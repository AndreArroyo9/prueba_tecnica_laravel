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
                        @cannot('isAdmin', \App\Models\Admin::class)
                        @cannot('isCreator', $servicio) {{--Verficia que el usuario no es creador--}}
                            @can('hire', $servicio) {{--Verifica si el usuario ya ha contratado el servicio o no--}}
                                <form method="POST" action="/servicios/{{ $servicio->id }}/contratar">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Contratar servicio</button>
                                </form>
                            @else
                                <div class="alert alert-success" role="alert">
                                    ¡Servicio contratado!
                                </div>
                            @endcan
                        @endcannot
                        @endcannot
                    </div>

                    <div class="col d-flex flex-column pt-3">
                        <p class="text-justify">Precio: {{ $servicio->price }} €</p>

{{--                        Dos botones: El primero crea un chat en caso de que no haya ningún chat entre los dos usuarios, el segundo--}}
{{--                        abre el chat que ya ha creado el usuario en el servicio. El creador no puede usar ninguno de los dos.--}}
                        @cannot('viewChats', $servicio)
                            @can('createChat', $servicio)
                            <form method="POST" action="/servicios/{{ $servicio->id }}/chat/{{ auth()->id() }}">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100">Contacta conmigo</button>
                            </form>
                            @else
                                <a href="/servicios/{{ $servicio->id }}/chat/{{ auth()->id() }}" class="btn btn-primary w-100">Abrir chat</a>
                            @endcan
                        @endcannot
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
