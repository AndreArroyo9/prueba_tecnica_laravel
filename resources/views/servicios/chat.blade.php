<x-layout>
    <div class="mx-auto pt-5 w-50">
            <h1 class="text-left mb-3">Chat {{ $servicio->title }}</h1>
            <h2 class="text-left mb-5">Servicio ofrecido por {{ $servicio->creator->user->name }}</h2>
        <div class="d-flex flex-column" id="chatContainer">
                <p class="text-left">Usuario 1 mensaje</p>
                <p class="text-right">Usuario 2 mensaje</p>
            <form method="POST">
                <input type="text" class="form-control" id="message" placeholder="Escribe tu mensaje">
                <button type="submit" class="btn btn-primary mt-3" id="send">Enviar</button>
            </form>
            <script>
                let send = document.getElementById('send');
                let text = document.getElementById('message').value;

                send.addEventListener('click', async (e) => {
                    e.preventDefault();

                    let  message = JSON.stringify({
                        message: text,
                        user_id: {{ Auth::id() }},
                        servicio_id: {{ $servicio->id }},
                        _token: '{{ csrf_token() }}'
                    });

                    const response = await fetch('/servicios/{{ $servicio->id }}/chat', {
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

                async function getMessage() {
                    await fetch('/servicios/{{ $servicio->id }}/chat')
                        .then(response => response.json())
                        .then(data => {
                            let messages = JSON.parse(data);
                            let chatContainer = "";
                            let newMessage;
                            for (let i = 0; i < messages.length; i++) {
                                if (messages[i].user_id === {{ Auth::id() }} || {{ Auth::id() }} === {{ $servicio->creator->user->id }}) {
                                    newMessage = "<p class='text-right'>" + messages[i].text + "</p>";
                                } else {
                                    newMessage = "<p class='text-left'>" + messages[i].text + "</p>";
                                }
                                chatContainer += newMessage;
                                document.querySelector('#chatContainer').innerHTML = chatContainer;
                            }
                        });
                }

            </script>
        </div>
    </div>
</x-layout>
