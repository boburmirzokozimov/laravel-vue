import{r as a,o as s,c as o,b as t,F as c,i,t as l,f as n}from"./app-0440f92d.js";/* empty css            */const p={class:"flex flex-col"},r={class:"sm:mx-0.5 lg:mx-0.5"},m={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},d={class:"overflow-hidden"},f={class:"min-w-full"},h=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Дата "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Сумма "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Файл Инвойса "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Номер карты ")])],-1),u={key:0,class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},y=["textContent"],_=["textContent"],g=["textContent"],b={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"},w=["href"],C={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"},v={key:0},F={__name:"CreditCardTransactionsHistoryTable",props:{credit_card_transactions:Object},setup(x){return a(!1),a(null),(k,S)=>(s(),o("div",p,[t("div",r,[t("div",m,[t("div",d,[t("table",f,[h,(s(!0),o(c,null,i(x.credit_card_transactions,e=>(s(),o("tbody",null,[e.status==="SUCCESS"?(s(),o("tr",u,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-left",textContent:l(e.id)},null,8,y),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:l(e.created_at)},null,8,_),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:l(e.sum)},null,8,g),t("td",b,[e.invoice_file?(s(),o("a",{key:0,href:"/storage/"+e.invoice_file,class:"rounded-lg bg-gray-200 px-4 py-1",target:"_blank"}," Открыть Файл ",8,w)):n("",!0)]),t("td",C,[e.invoice_file?n("",!0):(s(),o("span",v,l(e.card_number),1))])])):n("",!0)]))),256))])])])])]))}};export{F as default};
