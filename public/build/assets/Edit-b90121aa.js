import{_ as p,T as b,o as n,c as i,a as h,w as x,u as e,b as t,d as f,e as v,g as y,t as S,h as g,F as w,Z as E,p as T,m as k,A as I}from"./app-6889de1f.js";/* empty css            */const a=o=>(T("data-v-540551d8"),o=o(),k(),o),M=a(()=>t("title",null,"Edit Metal Transaction",-1)),V={class:"modal z-10 text-left"},B=a(()=>t("h1",{class:"mb-6"},"Edit Metal Transaction",-1)),N=["onSubmit"],j={class:"mb-6"},A=a(()=>t("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"sum"}," Сумма ",-1)),C={key:0,class:"text-red-500 text-sm"},D={class:"flex justify-end w-full"},F=["disabled"],z={__name:"Edit",props:{metalTransaction:Object},emits:["close"],setup(o,{emit:u}){const l=o,d=I({});let s=b({sum:null});const m=()=>{s.post(`/crypto/${l.metalTransaction.client_id}/`+l.metalTransaction.id,{onSuccess:()=>{u("close"),d.success("Successfully edited")},preserveScroll:!0,onError:r=>{d.error(r.message)}})};return(r,c)=>(n(),i(w,null,[h(e(E),null,{default:x(()=>[M]),_:1}),t("div",V,[B,t("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:f(m,["prevent"])},[t("div",j,[A,v(t("input",{id:"sum","onUpdate:modelValue":c[0]||(c[0]=_=>e(s).sum=_),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"sum",type:"number"},null,512),[[y,e(s).sum]]),e(s).errors.sum?(n(),i("div",C,S(e(s).errors.sum),1)):g("",!0)]),t("div",D,[t("button",{disabled:e(s).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"}," Активировать ",8,F)])],40,N)])],64))}},Z=p(z,[["__scopeId","data-v-540551d8"]]);export{Z as default};