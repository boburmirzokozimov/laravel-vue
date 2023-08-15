import{T as x,o as a,c as d,a as y,w as h,u as t,b as s,d as w,n as m,e as i,h as g,t as n,f as l,v as p,F as v,Z as k,A as S}from"./app-1e5e4c30.js";import{U as A}from"./maska-6f10db43.js";const V=s("title",null,"Создать Заявку",-1),C={class:""},B=s("h1",{class:"mb-6"},"Создать Заявку",-1),E=["onSubmit"],F={class:"mb-6"},M={key:0,class:"mb-6"},T=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"type"}," Тип ",-1),U=s("option",{value:"SEPA"},"SEPA ",-1),I=s("option",{value:"SWIFT"},"SWIFT",-1),N=[U,I],P={key:0,class:"text-red-500 text-sm"},j={key:1,class:"mb-6"},D=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"card_number"}," Номер карты ",-1),W={key:0,class:"text-red-500 text-sm"},$={key:2,class:"mb-6"},z=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"invoice_file"}," Файл Инвойса ",-1),O={key:0,class:"text-red-500 text-sm"},Z={class:"mb-6"},q=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"sum"}," Сумма ",-1),G={key:0,class:"text-red-500 text-sm"},H=["value"],J={class:"flex justify-end w-full"},K=["disabled"],R={__name:"ManageBalance",props:{card:Object},setup(b){const c=b,_=S({}),e=x({client_id:c.card.client_id,sum:0,type:"SEPA",invoice_file:null,withdraw:!1,card_number:""}),f=()=>{e.transform(u=>({...u,card_number:e.card_number.replaceAll(" ","")})).post("/credit-cards/"+c.card.id+"/manage",{onSuccess:()=>{_.success("Successfully created")}})};return(u,r)=>(a(),d(v,null,[y(t(k),null,{default:h(()=>[V]),_:1}),s("div",C,[B,s("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:w(f,["prevent"])},[s("div",F,[s("button",{class:m([t(e).withdraw?"text-gray-700":"bg-green-600 text-white","w-1/2 p-4 rounded-md"]),type:"button",onClick:r[0]||(r[0]=o=>t(e).withdraw=!1)}," Пополнение Баланса ",2),s("button",{class:m([t(e).withdraw?"bg-green-600 text-white":"text-gray-700","w-1/2 p-4 rounded-md"]),type:"button",onClick:r[1]||(r[1]=o=>t(e).withdraw=!0)}," Оплату по реквизитам ",2)]),t(e).withdraw?l("",!0):(a(),d("div",M,[T,i(s("select",{id:"type","onUpdate:modelValue":r[2]||(r[2]=o=>t(e).type=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"type"},N,512),[[g,t(e).type]]),t(e).errors.type?(a(),d("div",P,n(t(e).errors.type),1)):l("",!0)])),t(e).withdraw?(a(),d("div",$,[z,s("input",{id:"invoice_file",class:"border border-gray-200 p-2 w-full rounded-2xl",name:"invoice_file",type:"file",onInput:r[4]||(r[4]=o=>t(e).invoice_file=o.target.files[0])},null,32),t(e).errors.sum?(a(),d("div",O,n(t(e).errors.sum),1)):l("",!0)])):(a(),d("div",j,[D,i(s("input",{id:"card_number","onUpdate:modelValue":r[3]||(r[3]=o=>t(e).card_number=o),class:"border border-gray-200 p-2 w-full rounded-2xl","data-maska":"#### #### #### ####",name:"card_number",placeholder:"1234 5678 9123 4567",type:"text"},null,512),[[p,t(e).card_number],[t(A)]]),t(e).errors.card_number?(a(),d("div",W,n(t(e).errors.card_number),1)):l("",!0)])),s("div",Z,[q,i(s("input",{id:"sum","onUpdate:modelValue":r[5]||(r[5]=o=>t(e).sum=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"sum",type:"number"},null,512),[[p,t(e).sum]]),t(e).errors.sum?(a(),d("div",G,n(t(e).errors.sum),1)):l("",!0)]),t(e).progress?(a(),d("progress",{key:3,value:t(e).progress.percentage,max:"100"},n(t(e).progress.percentage)+"% ",9,H)):l("",!0),s("div",J,[s("button",{disabled:t(e).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"},"Создать ",8,K)])],40,E)])],64))}};export{R as default};
