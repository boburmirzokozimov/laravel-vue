import{T as h,o as n,c as l,a as f,w as v,u as t,b as s,d as k,n as _,e as u,h as m,t as a,f as d,F as b,i as g,v as c,Z as S,A as U}from"./app-9e3040f9.js";import{U as C}from"./maska-6f10db43.js";/* empty css            */const V=s("title",null,"Создать Заявку",-1),A={class:""},D=s("h1",{class:"mb-6"},"Создать Заявку",-1),H=["onSubmit"],T={class:"mb-6"},B={class:"mb-6"},j=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"type"}," Тип ",-1),E=s("option",{value:"CASH"},"Наличные",-1),L=s("option",{value:"CASHLESS"},"Безналичные",-1),M=s("option",{value:"USDT"},"USDT",-1),N=[E,L,M],F={key:0,class:"text-red-500 text-sm"},O={key:0,class:"mb-6"},$=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"country"}," Страна ",-1),q=["value","textContent"],z={key:0,class:"text-red-500 text-sm"},R={class:"mb-6"},Z=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"currency"}," Валюта ",-1),G=s("option",{selected:"",value:"USD"},"Доллары",-1),I=[G],J={key:0,class:"text-red-500 text-sm"},K={key:1,class:"mb-6"},P=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"contact"}," Контактное лицо ",-1),Q={key:0,class:"text-red-500 text-sm"},W={class:"mb-6"},X=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"sum"}," Сумма ",-1),Y={key:0,class:"text-red-500 text-sm"},ee={key:2,class:"mb-6"},te=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"withdraw_account_number"}," Расчетный счёт/номер карты ",-1),se={key:0,class:"text-red-500 text-sm"},oe={key:3,class:"mb-6"},re=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"withdraw_account_number"}," Номер кошелька ",-1),ne={key:0,class:"text-red-500 text-sm"},le={key:4,class:"mb-6"},de=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"usdt_type"}," USDT Тип ",-1),ae={key:0,class:"text-red-500 text-sm"},ue={key:5,class:"mb-6"},ce=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"phone"}," Номер телефона ",-1),ie={key:0,class:"text-red-500 text-sm"},me={key:6,class:"mb-6"},pe=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"info"}," Информация о переводе ",-1),_e={key:0,class:"text-red-500 text-sm"},be={class:"flex justify-end w-full"},ye=["disabled"],fe={__name:"CreateBalanceRequest",props:{client:Object,countries:Object},setup(y){const i=y,w=U({}),e=h({type:"CASH",country_id:"",currency:"USD",contact:"",sum:"",phone:"",client_id:i.client.id,withdraw:!1,info:"",usdt_type:"",withdraw_account_number:"",withdraw_wallet_number:""}),x=()=>{e.transform(p=>({...p,phone:e.phone.replaceAll(" ","").replaceAll("-","").replace("+","").replace("(","").replace(")","")})).post("/clients/"+i.client.id+"/manage-balance",{onSuccess:()=>{w.success("Successfully created")}})};return(p,o)=>(n(),l(b,null,[f(t(S),null,{default:v(()=>[V]),_:1}),s("div",A,[D,s("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:k(x,["prevent"])},[s("div",T,[s("button",{class:_([t(e).withdraw?"text-gray-700":"bg-green-600 text-white","w-1/2 p-4 rounded-md"]),type:"button",onClick:o[0]||(o[0]=r=>t(e).withdraw=!1)}," Пополнение Баланса ",2),s("button",{class:_([t(e).withdraw?"bg-green-600 text-white":"text-gray-700","w-1/2 p-4 rounded-md"]),type:"button",onClick:o[1]||(o[1]=r=>t(e).withdraw=!0)}," Списание баланса ",2)]),s("div",B,[j,u(s("select",{id:"type","onUpdate:modelValue":o[2]||(o[2]=r=>t(e).type=r),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"type"},N,512),[[m,t(e).type]]),t(e).errors.type?(n(),l("div",F,a(t(e).errors.type),1)):d("",!0)]),t(e).type==="CASH"?(n(),l("div",O,[$,u(s("select",{id:"country","onUpdate:modelValue":o[3]||(o[3]=r=>t(e).country_id=r),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"country"},[(n(!0),l(b,null,g(i.countries,r=>(n(),l("option",{value:r.id,textContent:a(r.name)},null,8,q))),256))],512),[[m,t(e).country_id]]),t(e).errors.country_id?(n(),l("div",z,a(t(e).errors.country),1)):d("",!0)])):d("",!0),s("div",R,[Z,u(s("select",{id:"currency","onUpdate:modelValue":o[4]||(o[4]=r=>t(e).currency=r),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"currency"},I,512),[[m,t(e).currency]]),t(e).errors.currency?(n(),l("div",J,a(t(e).errors.currency),1)):d("",!0)]),t(e).type==="CASH"?(n(),l("div",K,[P,u(s("input",{id:"contact","onUpdate:modelValue":o[5]||(o[5]=r=>t(e).contact=r),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"contact",type:"text"},null,512),[[c,t(e).contact]]),t(e).errors.contact?(n(),l("div",Q,a(t(e).errors.contact),1)):d("",!0)])):d("",!0),s("div",W,[X,u(s("input",{id:"sum","onUpdate:modelValue":o[6]||(o[6]=r=>t(e).sum=r),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"sum",type:"number"},null,512),[[c,t(e).sum]]),t(e).errors.sum?(n(),l("div",Y,a(t(e).errors.sum),1)):d("",!0)]),t(e).type==="CASHLESS"&&t(e).withdraw===!0?(n(),l("div",ee,[te,u(s("input",{id:"withdraw_account_number","onUpdate:modelValue":o[7]||(o[7]=r=>t(e).withdraw_account_number=r),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"withdraw_account_number",type:"number"},null,512),[[c,t(e).withdraw_account_number]]),t(e).errors.withdraw_account_number?(n(),l("div",se,a(t(e).errors.withdraw_account_number),1)):d("",!0)])):d("",!0),t(e).type==="USDT"&&t(e).withdraw===!0?(n(),l("div",oe,[re,u(s("input",{id:"withdraw_wallet_number","onUpdate:modelValue":o[8]||(o[8]=r=>t(e).withdraw_wallet_number=r),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"withdraw_wallet_number",type:"number"},null,512),[[c,t(e).withdraw_wallet_number]]),t(e).errors.withdraw_wallet_number?(n(),l("div",ne,a(t(e).errors.withdraw_wallet_number),1)):d("",!0)])):d("",!0),t(e).type==="USDT"?(n(),l("div",le,[de,u(s("input",{id:"usdt_type","onUpdate:modelValue":o[9]||(o[9]=r=>t(e).usdt_type=r),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"usdt_type",type:"text"},null,512),[[c,t(e).usdt_type]]),t(e).errors.usdt_type?(n(),l("div",ae,a(t(e).errors.usdt_type),1)):d("",!0)])):d("",!0),t(e).type==="CASH"?(n(),l("div",ue,[ce,u(s("input",{id:"phone","onUpdate:modelValue":o[10]||(o[10]=r=>t(e).phone=r),class:"border border-gray-200 p-2 w-full rounded-2xl","data-maska":"+998 (##) ###-##-##",name:"phone",type:"text"},null,512),[[c,t(e).phone],[t(C)]]),t(e).errors.phone?(n(),l("div",ie,a(t(e).errors.phone),1)):d("",!0)])):(n(),l("div",me,[pe,u(s("textarea",{id:"info","onUpdate:modelValue":o[11]||(o[11]=r=>t(e).info=r),class:"border border-gray-200 p-2 w-full rounded-2xl",cols:"15",name:"info"},null,512),[[c,t(e).info]]),t(e).errors.info?(n(),l("div",_e,a(t(e).errors.info),1)):d("",!0)])),s("div",be,[s("button",{disabled:t(e).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"},"Создать ",8,ye)])],40,H)])],64))}};export{fe as default};
