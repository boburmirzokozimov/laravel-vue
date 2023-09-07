import {Centrifuge} from "centrifuge";
import axios from "axios";

getToken()

window.Centrifugo = new Centrifuge('ws://localhost:8003/connection/websocket', {
    token: localStorage.getItem('token'),
    debug: true
})
Centrifugo.connect();

function getToken() {
    return axios.get('/getToken').then((data) => {
        localStorage.setItem('token', data.data.token)
    })
}

