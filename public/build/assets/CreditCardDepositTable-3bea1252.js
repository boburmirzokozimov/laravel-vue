import{r as i,o as s,c as o,b as t,F as d,i as u,t as a,f as p,d as y,O as m,A as _}from"./app-29ae78f3.js";/* empty css            */const w={class:"flex flex-col"},b={class:"sm:mx-0.5 lg:mx-0.5"},C={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},v={class:"overflow-hidden"},S={class:"min-w-full"},k=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Дата "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Сумма "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Номер карты "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Статус "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Действие ")])],-1),B={key:0,class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},E=["textContent"],O=["textContent"],$=["textContent"],j={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"},A={key:0},D={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"},F=["onChange"],N=["selected","value","textContent"],V={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"},L={class:"flex flex-col justify-around"},M=["onClick"],q={__name:"CreditCardDepositTable",props:{credit_card_transactions:Object,transaction_statuses:Object},setup(x){const h=x,c=_({});i(!1),i(null);const f=(l,r)=>{m.post(`/credit-cards/${l}/manage/${r}`,{_method:"patch"},{onSuccess:()=>{c.success("Процесс выполнен")},onError:e=>{c.error(e.message)},preserveScroll:!0})},g=(l,r)=>{m.post(`/transactions/${r}/status`,{_method:"patch",status:l.target.value},{onSuccess:()=>{c.success("Статус изменён")},onError:e=>{c.error(e.message)},preserveScroll:!0})};return(l,r)=>(s(),o("div",w,[t("div",b,[t("div",C,[t("div",v,[t("table",S,[k,(s(!0),o(d,null,u(x.credit_card_transactions,e=>(s(),o("tbody",null,[!e.withdraw&&e.status!=="SUCCESS"?(s(),o("tr",B,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-left",textContent:a(e.id)},null,8,E),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:a(e.created_at)},null,8,O),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:a(e.sum)},null,8,$),t("td",j,[e.invoice_file?p("",!0):(s(),o("span",A,a(e.card_number),1))]),t("td",D,[t("form",null,[t("select",{id:"category",class:"border border-gray-200 p-2 w-full rounded-2xl",name:"category",onChange:y(n=>g(n,e.id),["prevent"])},[(s(!0),o(d,null,u(h.transaction_statuses,n=>(s(),o("option",{selected:n===e.status,value:n,textContent:a(n)},null,8,N))),256))],40,F)])]),t("td",V,[t("div",L,[l.$page.props.is_manager?(s(),o("button",{key:0,class:"mt-1 btn-success mx-auto w-1/2",type:"button",onClick:()=>f(e.credit_card_id,e.id)},"Подтвердить ",8,M)):p("",!0)])])])):p("",!0)]))),256))])])])])]))}};export{q as default};
