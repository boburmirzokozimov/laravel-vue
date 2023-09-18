import{_,T as m,o as n,c as o,a as h,w as p,u as y,b as t,t as a,h as c,F as b,Z as g,p as f,m as w,A as C}from"./app-eae80e9d.js";/* empty css            */const s=e=>(f("data-v-3b72ddd5"),e=e(),w(),e),q=s(()=>t("title",null,"Инфо об заявке",-1)),S={class:"modal z-10 w-3/4"},k=s(()=>t("h1",{class:"mb-6"},"Инфо об заявке",-1)),v={class:"flex flex-col"},U={class:"sm:mx-0.5 lg:mx-0.5"},I={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},A={class:"overflow-hidden"},D={class:"min-w-full"},T={class:""},B={class:"border-b border-t"},E=s(()=>t("th",{class:"w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Сумма ",-1)),H=["textContent"],N={key:0,class:"border-b"},P=s(()=>t("th",{class:"w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Валюта ",-1)),V=["textContent"],F={key:1,class:"border-b"},L=s(()=>t("th",{class:"w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Контактное лицо ",-1)),j=["textContent"],z={key:2,class:"border-b"},O=s(()=>t("th",{class:"w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Номер телефона ",-1)),Z=["textContent"],G={key:3,class:"border-b"},J=s(()=>t("th",{class:"w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Информация о переводе ",-1)),K=["textContent"],M={key:4,class:"border-b"},Q=s(()=>t("th",{class:"w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," USDT Тип ",-1)),R=["textContent"],W={key:5,class:"border-b"},X=s(()=>t("th",{class:"w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Расчетный счёт/номер карты ",-1)),Y=["textContent"],$={key:6,class:"border-b"},tt=s(()=>t("th",{class:"w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Номер кошелька ",-1)),et=["textContent"],st=s(()=>t("th",{class:"w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Действие ",-1)),nt=s(()=>t("i",{class:"fa fa-check text-white"},null,-1)),ot=[nt],at={__name:"InfoPopUp",props:{balance_request:Object},emits:["close"],setup(e,{emit:i}){const l=e,r=C({}),x=m({}),u=()=>{x.post("/clients/"+l.balance_request.client_id+"/manage-balance/"+l.balance_request.id,{onError:d=>{r.error(d.message)},preserveScroll:!0,onSuccess:()=>{r.success("Процесс выполнен")}}),i("close")};return(d,ct)=>(n(),o(b,null,[h(y(g),null,{default:p(()=>[q]),_:1}),t("div",S,[k,t("div",null,[t("div",v,[t("div",U,[t("div",I,[t("div",A,[t("table",D,[t("tbody",T,[t("tr",B,[E,t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right",textContent:a(e.balance_request.sum)},null,8,H)]),e.balance_request.type==="USDT"?(n(),o("tr",N,[P,t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right",textContent:a(e.balance_request.currency)},null,8,V)])):c("",!0),e.balance_request.type==="CASH"?(n(),o("tr",F,[L,t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline",textContent:a(e.balance_request.contact)},null,8,j)])):c("",!0),e.balance_request.type==="CASH"?(n(),o("tr",z,[O,t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline",textContent:a(e.balance_request.phone)},null,8,Z)])):c("",!0),e.balance_request.type==="CASHLESS"||e.balance_request.type==="USDT"?(n(),o("tr",G,[J,t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline",textContent:a(e.balance_request.info)},null,8,K)])):c("",!0),e.balance_request.type==="USDT"?(n(),o("tr",M,[Q,t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline",textContent:a(e.balance_request.usdt_type)},null,8,R)])):c("",!0),e.balance_request.type==="CASHLESS"&&e.balance_request.withdraw?(n(),o("tr",W,[X,t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline",textContent:a(e.balance_request.withdraw_account_number)},null,8,Y)])):c("",!0),e.balance_request.type==="USDT"&&e.balance_request.withdraw?(n(),o("tr",$,[tt,t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline",textContent:a(e.balance_request.withdraw_wallet_number)},null,8,et)])):c("",!0),t("tr",{class:"border-b"},[st,t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline"},[t("button",{class:"btn-success",onClick:u},ot)])])])])])])])])])])],64))}},dt=_(at,[["__scopeId","data-v-3b72ddd5"]]);export{dt as default};