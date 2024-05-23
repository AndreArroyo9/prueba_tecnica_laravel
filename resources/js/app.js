import './bootstrap';
import 'echo.js';

Echo.channel('channel_chat')
    .listen('GotMessage', (e) => {
        console.log(e);
    });

