import{T as _,o as a,c as n,a as f,w,u as t,b as s,d as x,n as u,t as i,f as l,e as g,v as h,F as v,Z as y,A as k}from"./app-13a5847b.js";/* empty css            */const S=s("title",null,"Создать Заявку",-1),C={class:""},A=s("h1",{class:"mb-6"},"Создать Заявку",-1),B=["onSubmit"],V={class:"mb-6"},M={key:0,class:"mb-6"},N=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"invoice_file"}," Файл Инвойса ",-1),j={key:0,class:"text-red-500 text-sm"},D={class:"mb-6"},E=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"sum"}," Сумма ",-1),F={key:0,class:"text-red-500 text-sm"},T=["value"],$={class:"flex justify-end w-full"},z=["disabled"],P={__name:"ManageBalance",props:{card:Object},setup(m){const d=m,p=k({}),e=_({client_id:d.card.client_id,sum:0,type:"SEPA",invoice_file:null,withdraw:!1,card_number:""}),b=()=>{e.transform(c=>({...c,card_number:e.card_number.replaceAll(" ","")})).post("/credit-cards/"+d.card.id+"/manage",{onSuccess:()=>{p.success("Successfully created")}})};return(c,o)=>(a(),n(v,null,[f(t(y),null,{default:w(()=>[S]),_:1}),s("div",C,[A,s("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:x(b,["prevent"])},[s("div",V,[s("button",{class:u([t(e).withdraw?"text-gray-700":"bg-green-600 text-white","w-1/2 p-4 rounded-md"]),type:"button",onClick:o[0]||(o[0]=r=>t(e).withdraw=!1)}," Пополнение Баланса ",2),s("button",{class:u([t(e).withdraw?"bg-green-600 text-white":"text-gray-700","w-1/2 p-4 rounded-md"]),type:"button",onClick:o[1]||(o[1]=r=>t(e).withdraw=!0)}," Оплату по реквизитам ",2)]),t(e).withdraw?(a(),n("div",M,[N,s("input",{id:"invoice_file",class:"border border-gray-200 p-2 w-full rounded-2xl",name:"invoice_file",type:"file",onInput:o[2]||(o[2]=r=>t(e).invoice_file=r.target.files[0])},null,32),t(e).errors.sum?(a(),n("div",j,i(t(e).errors.sum),1)):l("",!0)])):l("",!0),s("div",D,[E,g(s("input",{id:"sum","onUpdate:modelValue":o[3]||(o[3]=r=>t(e).sum=r),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"sum",type:"number"},null,512),[[h,t(e).sum]]),t(e).errors.sum?(a(),n("div",F,i(t(e).errors.sum),1)):l("",!0)]),t(e).progress?(a(),n("progress",{key:1,value:t(e).progress.percentage,max:"100"},i(t(e).progress.percentage)+"% ",9,T)):l("",!0),s("div",$,[s("button",{disabled:t(e).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"},"Создать ",8,z)])],40,B)])],64))}};export{P as default};
