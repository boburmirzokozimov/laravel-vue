import e from"./ChatRooms-b8d4186e.js";import{o as c,c as r,a as m,b as s}from"./app-13a5847b.js";import"./lodash-2eb18fc9.js";/* empty css            */const _={class:"bg-gray-200 rounded-xl p-6"},n=s("div",{class:"mt-6 mb-6"},[s("h2",{class:"mt-6 text-2xl font-semibold italic"}," Chats ")],-1),u={__name:"Index",props:{chat_rooms:Object},setup(a){const o=a;return Echo.private("room").listen("ChatRoomCreated",t=>{o.chat_rooms.push(t.chatRoom)}),(t,i)=>(c(),r("div",_,[n,m(e,{chat_rooms:o.chat_rooms},null,8,["chat_rooms"])]))}};export{u as default};
