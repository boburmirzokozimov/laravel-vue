import{r as i,T as p,o as _,c as f,b as s,s as n,e as b,v as g,u as d,d as v,O as u}from"./app-a3f0f65f.js";/* empty css            */const h={class:"mt-6"},y=["onSubmit"],x={class:"mb-6 flex"},w={class:"relative"},S=s("button",{class:"btn-edit !bg-blue-400",style:{"border-radius":"1rem 0 0 1rem"}},"Отправить файл ",-1),B=s("button",{class:"btn-edit !bg-blue-400",style:{"border-radius":"0 1rem  1rem 0"}}," Send ",-1),O={__name:"Create",props:{chat_room_id:null,client_id:null},setup(c){const l=c;let e=i(null),o=i(!1);const t=p({message:"",chat_room_id:l.chat_room_id,type:""}),m=()=>{o.value?(console.log(e.value.type),t.type=e.value.type==="image/png"?"image":"",u.post("/uploadFile",{message:e.value,chat_room_id:l.chat_room_id,type:t.type},{preserveScroll:!0}),e.value="",o=!1):(u.post("/send/"+l.client_id,{message:t.message,chat_room_id:t.chat_room_id,client_id:l.client_id},{preserveScroll:!0}),t.message="")};return(M,r)=>(_(),f("div",h,[s("form",{class:"w-full mx-auto",method:"post",onSubmit:v(m,["prevent"])},[s("div",x,[s("div",w,[s("input",{id:"file",class:"absolute opacity-0 w-full h-full cursor-pointer",name:"file",type:"file",onInput:r[0]||(r[0]=a=>{n(e)?e.value=a.target.files[0]:e=a.target.files[0],n(o)?o.value=!0:o=!0})},null,32),S]),b(s("input",{id:"message","onUpdate:modelValue":r[1]||(r[1]=a=>d(t).message=a),class:"border border-gray-200 w-full focus:border-none active:border-none active:outline-0 focus:outline-0",name:"message",style:{"border-bottom-right-radius":"0","border-top-right-radius":"0"},type:"text"},null,512),[[g,d(t).message]]),B])],40,y)]))}};export{O as default};