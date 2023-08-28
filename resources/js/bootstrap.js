import Pusher from 'pusher-js';
import Echo from "laravel-echo"

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '1',
    cluster: 'mt1',
    wsHost: window.location.hostname,
    wsPort: 6001,
    wssPort: 443
});

