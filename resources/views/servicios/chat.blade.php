<x-layout>
    <div class="mx-auto pt-5 w-50">
            <h1 class="text-left mb-3">Chat {{ $servicio->title }}</h1>
            <h2 class="text-left mb-5">Servicio ofrecido por {{ $servicio->creator->user->name }}</h2>
        <div class="d-flex flex-column" id="chatContainer">
        </div>
            <form method="POST">
                <input type="text" class="form-control" id="text" placeholder="Escribe tu mensaje">
                <button type="submit" class="btn btn-primary mt-3" id="send">Enviar</button>
            </form>

            <script>
                getMessages();
                let send = document.getElementById('send');

                let messageCounter = 0;
                send.addEventListener('click', async (e) => {
                    messageCounter++;
                    e.preventDefault();
                    let textInput = document.getElementById('text').value;
                    let  message = JSON.stringify({
                        text: textInput,
                        chat_id: {{ $chat->id }},
                        user_id: {{ Auth::id() }},
                        _token: '{{ csrf_token() }}'
                    });
                    document.getElementById('text').value = "";
                    const response = await fetch('/servicios/{{ $servicio->id }}/chat/{{ $user_id }}/send', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: message
                    });
                    const apiResponse = await response.json();
                    console.log(apiResponse);
                });


                async function getMessages() {
                    await fetch('/servicios/{{ $servicio->id }}/chat/{{ $user_id }}/update/{{ $chat->id }}')
                        .then(response => {
                            if (response.ok) {
                                return response.json();
                            }
                            throw new Error(response.status);
                        })
                        .then(messages => {
                            let chatContainer = "";
                            for (let i = 0; i < messages.length; i++) {
                                let newMessage;
                                // Verifica cuáles son los mensajes del usuario autentificado, para ponerlos a la izquierda o a la derecha
                                if (messages[i].user_id === {{ Auth::id() }}) {
                                    newMessage = "<p class='text-right'><span class='font-weight-bold'>{{ Auth::user()->name }}: </span>" + messages[i].message + "</p>";
                                } else {
                                    newMessage = "<p class='text-left'><span class='font-weight-bold'>"+ messages[i].user_name +" </span>" + messages[i].message + "</p>";
                                }
                                // Concatena los mensajes en el div
                                chatContainer += newMessage;
                            }
                            // Reemplaza el contenido del div
                            document.querySelector('#chatContainer').innerHTML = chatContainer;
                        })
                        .catch(err => {
                            console.error("Error: ", err.message);
                        })
                }
                    // Ejecuta getMessage() cada segundo
                    setInterval(getMessages, 1000);
            </script>
    </div>
</x-layout>
