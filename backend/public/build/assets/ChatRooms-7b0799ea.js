import{T as h,m as f,O as n,o,c as l,b as t,e as _,h as x,u as r,F as i,i as b,a as v,n as w,t as y,N as C,f as g,A as k}from"./app-d5cbf76a.js";import{l as A}from"./lodash-3a1f5a60.js";/* empty css            */const N={class:"w-1/5 mb-6"},S=t("option",{value:""},"All",-1),V=t("option",{value:"false"},"Active",-1),B=t("option",{value:"true"},"Archive",-1),F=[S,V,B],O={class:"rounded-2xl text-white text-xl mr-2 bg-blue-400 mb-6 text-left flex justify-between items-center"},j={key:0,class:"flex items-center w-1/12"},D=["onClick"],q={__name:"ChatRooms",props:{chat_rooms:Object},setup(d){const u=d,m=k({}),p=s=>{n.post(`/chat-room/${s}`,{},{onSuccess:()=>{m.success("Successfully edited")}})},c=h({completed:""});return f(c,A.debounce(function(s){n.get("/chat",{completed:s.completed},{preserveState:!0,replace:!0})},500)),(s,a)=>(o(),l(i,null,[t("div",N,[_(t("select",{id:"category","onUpdate:modelValue":a[0]||(a[0]=e=>r(c).completed=e),class:"h-full border border-gray-200 p-2 w-full rounded-2xl",name:"category",required:""},F,512),[[x,r(c).completed]])]),(o(!0),l(i,null,b(u.chat_rooms,e=>(o(),l("div",O,[v(C,{class:w([e.completed&&"py-4","text-white w-11/12 ml-2"]),href:`/chat/${e.id}`,textContent:y(e.client.full_name)},null,8,["class","href","textContent"]),e.completed?g("",!0):(o(),l("div",j,[t("button",{id:"completed",class:"btn-success",name:"completed",type:"button",onClick:()=>p(e.id)}," Finish the chat ",8,D)]))]))),256))],64))}};export{q as default};