import{T as w,o as d,c as l,a as y,w as x,u as t,b as s,d as h,q as m,e as a,v as f,t as u,h as n,g as i,F as g,Z as v,A as k}from"./app-fd01b110.js";/* empty css            */const S=s("title",null,"Создать Заявку",-1),U={class:""},V=s("h1",{class:"mb-6"},"Создать Заявку",-1),C=["onSubmit"],D={class:"mb-6"},T={class:"mb-6"},A=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"currency"}," Валюта ",-1),B=s("option",{selected:"",value:"USD"},"USD",-1),E=s("option",{selected:"",value:"EUR"},"EUR",-1),j=[B,E],M={key:0,class:"text-red-500 text-sm"},N={class:"mb-6"},R=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"sum"}," Сумма ",-1),q={key:0,class:"text-red-500 text-sm"},F={key:0,class:"mb-6"},H=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"withdraw_account_number"}," Расчетный счёт/номер карты ",-1),O={key:0,class:"text-red-500 text-sm"},$={key:1,class:"mb-6"},z=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"withdraw_account_number"}," Номер кошелька ",-1),L={key:0,class:"text-red-500 text-sm"},Z={key:2,class:"mb-6"},G=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"usdt_type"}," USDT Тип ",-1),I={key:0,class:"text-red-500 text-sm"},J={key:3,class:"mb-6"},K=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"info"}," Информация о переводе ",-1),P={key:0,class:"text-red-500 text-sm"},Q={class:"flex justify-end w-full"},W=["disabled"],te={__name:"CreateBalanceRequest",props:{client:Object,countries:Object},setup(_){const c=_,b=k({}),e=w({type:"CASH",currency:"USD",sum:"",client_id:c.client.id,withdraw:!1,info:""}),p=()=>{e.post("/clients/"+c.client.id+"/manage-balance",{onSuccess:()=>{b.success("Successfully created")}})};return(X,r)=>(d(),l(g,null,[y(t(v),null,{default:x(()=>[S]),_:1}),s("div",U,[V,s("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:h(p,["prevent"])},[s("div",D,[s("button",{class:m([t(e).withdraw?"text-gray-700":"bg-green-600 text-white","w-1/2 p-4 rounded-md"]),type:"button",onClick:r[0]||(r[0]=o=>t(e).withdraw=!1)}," Пополнение Баланса ",2),s("button",{class:m([t(e).withdraw?"bg-green-600 text-white":"text-gray-700","w-1/2 p-4 rounded-md"]),type:"button",onClick:r[1]||(r[1]=o=>t(e).withdraw=!0)}," Списание баланса ",2)]),s("div",T,[A,a(s("select",{id:"currency","onUpdate:modelValue":r[2]||(r[2]=o=>t(e).currency=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"currency"},j,512),[[f,t(e).currency]]),t(e).errors.currency?(d(),l("div",M,u(t(e).errors.currency),1)):n("",!0)]),s("div",N,[R,a(s("input",{id:"sum","onUpdate:modelValue":r[3]||(r[3]=o=>t(e).sum=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"sum",type:"number"},null,512),[[i,t(e).sum]]),t(e).errors.sum?(d(),l("div",q,u(t(e).errors.sum),1)):n("",!0)]),t(e).type==="CASHLESS"&&t(e).withdraw===!0?(d(),l("div",F,[H,a(s("input",{id:"withdraw_account_number","onUpdate:modelValue":r[4]||(r[4]=o=>t(e).withdraw_account_number=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"withdraw_account_number",type:"number"},null,512),[[i,t(e).withdraw_account_number]]),t(e).errors.withdraw_account_number?(d(),l("div",O,u(t(e).errors.withdraw_account_number),1)):n("",!0)])):n("",!0),t(e).type==="USDT"&&t(e).withdraw===!0?(d(),l("div",$,[z,a(s("input",{id:"withdraw_wallet_number","onUpdate:modelValue":r[5]||(r[5]=o=>t(e).withdraw_wallet_number=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"withdraw_wallet_number",type:"number"},null,512),[[i,t(e).withdraw_wallet_number]]),t(e).errors.withdraw_wallet_number?(d(),l("div",L,u(t(e).errors.withdraw_wallet_number),1)):n("",!0)])):n("",!0),t(e).type==="USDT"?(d(),l("div",Z,[G,a(s("input",{id:"usdt_type","onUpdate:modelValue":r[6]||(r[6]=o=>t(e).usdt_type=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"usdt_type",type:"text"},null,512),[[i,t(e).usdt_type]]),t(e).errors.usdt_type?(d(),l("div",I,u(t(e).errors.usdt_type),1)):n("",!0)])):(d(),l("div",J,[K,a(s("textarea",{id:"info","onUpdate:modelValue":r[7]||(r[7]=o=>t(e).info=o),class:"border border-gray-200 p-2 w-full rounded-2xl",cols:"15",name:"info"},null,512),[[i,t(e).info]]),t(e).errors.info?(d(),l("div",P,u(t(e).errors.info),1)):n("",!0)])),s("div",Q,[s("button",{disabled:t(e).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"},"Создать ",8,W)])],40,C)])],64))}};export{te as default};