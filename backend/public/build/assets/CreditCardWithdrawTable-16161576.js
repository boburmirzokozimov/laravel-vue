import{r as x,o as s,c as o,b as t,F as d,g as m,t as l,f as p,O as h,A as u}from"./app-1e5e4c30.js";const f={class:"flex flex-col"},g={class:"sm:mx-0.5 lg:mx-0.5"},y={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},_={class:"overflow-hidden"},w={class:"min-w-full"},b=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Дата "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Сумма "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Файл Инвойса "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Тип "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Действие ")])],-1),C={key:0,class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},v=["textContent"],k=["textContent"],B=["textContent"],O={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"},E=["href"],N=["textContent"],S={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"},$={class:"flex flex-col justify-around"},j=["onClick"],F={__name:"CreditCardWithdrawTable",props:{credit_card_transactions:Object},setup(r){const n=u({});x(!1),x(null);const i=(a,c)=>{h.post(`/credit-cards/${a}/manage/${c}`,{_method:"patch"},{onSuccess:()=>{n.success("Процесс выполнен")},onError:e=>{n.error(e.message)},preserveScroll:!0})};return(a,c)=>(s(),o("div",f,[t("div",g,[t("div",y,[t("div",_,[t("table",w,[b,(s(!0),o(d,null,m(r.credit_card_transactions,e=>(s(),o("tbody",null,[e.withdraw&&e.status==="OPEN"?(s(),o("tr",C,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-left",textContent:l(e.id)},null,8,v),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:l(e.created_at)},null,8,k),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:l(e.sum)},null,8,B),t("td",O,[t("a",{href:"/storage/"+e.invoice_file,class:"rounded-lg bg-gray-200 px-4 py-1",target:"_blank"}," Открыть Файл ",8,E)]),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:l(e.type)},null,8,N),t("td",S,[t("div",$,[a.$page.props.is_manager?(s(),o("button",{key:0,class:"mt-1 btn-success mx-auto w-1/2",type:"button",onClick:()=>i(e.credit_card_id,e.id)},"Подтвердить ",8,j)):p("",!0)])])])):p("",!0)]))),256))])])])])]))}};export{F as default};
