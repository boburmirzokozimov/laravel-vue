import{T as d,o as i,c as l,b as s,e as c,v as m,u as t,d as u}from"./app-1e5e4c30.js";const p={class:"mt-6"},_=["onSubmit"],b={class:"mb-6 flex"},f=s("button",{class:"btn-edit !bg-blue-400",style:{"border-radius":"0 1rem  1rem 0"}}," Send ",-1),x={__name:"Create",props:{chat_room_id:null},setup(r){const e=d({message:"",chat_room_id:r.chat_room_id}),a=()=>{e.post("/send",{preserveScroll:!0}),e.message=""};return(g,o)=>(i(),l("div",p,[s("form",{class:"w-full mx-auto",method:"post",onSubmit:u(a,["prevent"])},[s("div",b,[c(s("input",{id:"message","onUpdate:modelValue":o[0]||(o[0]=n=>t(e).message=n),class:"border border-gray-200 w-full rounded-2xl focus:border-none active:border-none active:outline-0 focus:outline-0",name:"message",style:{"border-bottom-right-radius":"0","border-top-right-radius":"0"},type:"text"},null,512),[[m,t(e).message]]),f])],40,_)]))}};export{x as default};
