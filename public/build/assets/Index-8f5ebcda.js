import a from"./ChatRooms-a7e6b6de.js";import{n,o as r,c as i,a as m,b as e}from"./app-a3f0f65f.js";import"./lodash-3a343b21.js";/* empty css            */const p={class:"bg-gray-200 rounded-xl p-6"},_=e("div",{class:"mt-6 mb-6"},[e("h2",{class:"mt-6 text-2xl font-semibold italic"}," Chats ")],-1),f={__name:"Index",props:{chat_rooms:Object},setup(c){const t=c,o=Centrifugo.newSubscription("finHelpRooms");return o.subscribe(),o.on("publication",function(s){t.chat_rooms.push(s.data.chatRoom)}),n(()=>{Centrifugo.removeSubscription(o)}),(s,u)=>(r(),i("div",p,[_,m(a,{chat_rooms:t.chat_rooms},null,8,["chat_rooms"])]))}};export{f as default};
