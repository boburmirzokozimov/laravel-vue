import{_ as x,T as f,o as u,c as m,a as h,w as v,u as t,b as e,d as q,e as c,v as _,t as i,f as l,F as C,Z as g,p as w,m as S,A as k}from"./app-015141e4.js";/* empty css            */const r=n=>(w("data-v-b9111118"),n=n(),S(),n),A=r(()=>e("title",null,"Edit Card Request",-1)),E={class:"modal z-10 text-left"},R=r(()=>e("h1",{class:"mb-6"},"Edit Card Request",-1)),V=["onSubmit"],I={class:"mb-6"},j=r(()=>e("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"anonymous_surname"}," Предпочитаемое Фамилия ",-1)),B={key:0,class:"text-red-500 text-sm"},N={class:"mb-6"},T=r(()=>e("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"anonymous_name"}," Предпочитаемое Имя ",-1)),D={key:0,class:"text-red-500 text-sm"},F={class:"flex justify-end w-full"},M=["disabled"],O={__name:"EditAnonymousCreditCardRequest",props:{client:Object,credit_card_request:Object},emits:["close"],setup(n,{emit:p}){const o=n,y=k({});let s=f({_method:"PATCH",id:o.credit_card_request.id,anonymous:o.credit_card_request.anonymous,anonymous_name:o.credit_card_request.anonymous_name,anonymous_surname:o.credit_card_request.anonymous_surname});const b=()=>{s.post("/clients/"+o.credit_card_request.client_id+"/manage-credit-card-anonymous/"+o.credit_card_request.id,{onSuccess:()=>{p("close"),y.success("Successfully edited")},preserveScroll:!0})};return(U,a)=>(u(),m(C,null,[h(t(g),null,{default:v(()=>[A]),_:1}),e("div",E,[R,e("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:q(b,["prevent"])},[e("div",I,[j,c(e("input",{id:"anonymous_surname","onUpdate:modelValue":a[0]||(a[0]=d=>t(s).anonymous_surname=d),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"anonymous_surname",type:"text"},null,512),[[_,t(s).anonymous_surname]]),t(s).errors.anonymous_surname?(u(),m("div",B,i(t(s).errors.anonymous_surname),1)):l("",!0)]),e("div",N,[T,c(e("input",{id:"anonymous_name","onUpdate:modelValue":a[1]||(a[1]=d=>t(s).anonymous_name=d),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"anonymous_name",type:"text"},null,512),[[_,t(s).anonymous_name]]),t(s).errors.anonymous_name?(u(),m("div",D,i(t(s).errors.anonymous_name),1)):l("",!0)]),e("div",F,[e("button",{disabled:t(s).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"}," Редактировать ",8,M)])],40,V)])],64))}},P=x(O,[["__scopeId","data-v-b9111118"]]);export{P as default};
