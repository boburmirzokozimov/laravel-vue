import i from"./Create-b93cd231.js";import{o as e,c as s,F as _,h as m,a as p,b as r,n as c,f as n,t as h}from"./app-b27e3b28.js";/* empty css            */const u={class:"bg-gray-200 rounded-xl p-6"},g=r("div",{class:"mt-6 mb-6"},[r("h2",{class:"mt-6 text-2xl font-semibold italic"}," Chat ")],-1),x={key:0},y=["src"],b={key:1},f=["href"],v=["textContent"],N={__name:"Messages",props:{chat_room:Object},setup(d){const o=d;Echo.private(`chat.${o.chat_room.id}.${o.chat_room.client_id}`).listen("MessageSentByClient",a=>{o.chat_room.messages.push(JSON.parse(a.message))});const l=a=>a==="App\\Models\\User\\User";return(a,k)=>(e(),s("div",u,[g,(e(!0),s(_,null,m(o.chat_room.messages,t=>(e(),s("div",{class:c([l(t.messageble_type)?"justify-end":"justify-start","flex"])},[r("div",{class:c([l(t.messageble_type)?"text-right rounded-tl-3xl rounded-tr-xl mr-2 rounded-bl-3xl bg-blue-400":"text-left rounded-tr-3xl rounded-tl-xl ml-2 rounded-br-3xl bg-gray-400","mb-2 py-3 px-4 w-1/2 text-white"])},[t.type==="image"?(e(),s("div",x,[r("img",{src:`/storage/${t.message}`,alt:"image"},null,8,y)])):n("",!0),t.type==="doc"?(e(),s("div",b,[r("a",{href:`/storage/${t.message}`,class:"rounded-lg bg-gray-200 px-4 py-1",target:"_blank"}," Открыть Файл ",8,f)])):n("",!0),t.type?n("",!0):(e(),s("div",{key:2,textContent:h(t.message)},null,8,v))],2)],2))),256)),p(i,{chat_room_id:o.chat_room.id},null,8,["chat_room_id"])]))}};export{N as default};
