import{r as x,o as s,c as o,b as t,F as m,g as d,t as l,f as p,O as u,A as h}from"./app-1e5e4c30.js";const f={class:"flex flex-col"},y={class:"sm:mx-0.5 lg:mx-0.5"},g={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},_={class:"overflow-hidden"},w={class:"min-w-full"},b=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Дата "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Сумма "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Номер карты "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Тип "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Действие ")])],-1),C={key:0,class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},v=["textContent"],k=["textContent"],B=["textContent"],O=["textContent"],E=["textContent"],N={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"},S={class:"flex flex-col justify-around"},$=["onClick"],A={__name:"CreditCardDepositTable",props:{credit_card_transactions:Object},setup(r){const a=h({});x(!1),x(null);const i=(n,c)=>{u.post(`/credit-cards/${n}/manage/${c}`,{_method:"patch"},{onSuccess:()=>{a.success("Процесс выполнен")},onError:e=>{a.error(e.message)},preserveScroll:!0})};return(n,c)=>(s(),o("div",f,[t("div",y,[t("div",g,[t("div",_,[t("table",w,[b,(s(!0),o(m,null,d(r.credit_card_transactions,e=>(s(),o("tbody",null,[!e.withdraw&&e.status==="OPEN"?(s(),o("tr",C,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-left",textContent:l(e.id)},null,8,v),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:l(e.created_at)},null,8,k),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:l(e.sum)},null,8,B),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:l(e.card_number)},null,8,O),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:l(e.type)},null,8,E),t("td",N,[t("div",S,[n.$page.props.is_manager?(s(),o("button",{key:0,class:"mt-1 btn-success mx-auto w-1/2",type:"button",onClick:()=>i(e.credit_card_id,e.id)},"Подтвердить ",8,$)):p("",!0)])])])):p("",!0)]))),256))])])])])]))}};export{A as default};
