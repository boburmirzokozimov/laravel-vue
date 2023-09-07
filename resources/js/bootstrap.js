import {Centrifuge} from "centrifuge";
import axios from "axios";

getToken()

const baseUrl = import.meta.env.VITE_CENTRIFUGO_ENDPOINT

window.Centrifugo = new Centrifuge('wss://socket.sab-lab.com/connection/websocket', {
    token: localStorage.getItem('token'),
    debug: true
})
Centrifugo.connect();

function getToken() {
    return axios.get('/getToken').then((data) => {
        localStorage.setItem('token', data.data.token)
    })
}

