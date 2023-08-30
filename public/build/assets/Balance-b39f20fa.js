import{o,c as n,a as d,w as x,u as h,b as t,F as a,i,Z as u,t as l,d as m,e as _,g as y}from"./app-264c3397.js";/* empty css            */const g=t("title",null,"Balance Transactions",-1),f={class:"flex flex-col"},w={class:"sm:mx-0.5 lg:mx-0.5"},C={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},b={class:"overflow-hidden"},v={class:"min-w-full"},S=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Client "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Sum "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Type "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Status "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Action ")])],-1),B={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},k=["textContent"],D=["textContent"],E=["textContent"],F=["textContent"],N={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},T=["onChange"],V=["selected","value","textContent"],j=t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},null,-1),O={__name:"Balance",props:{balance_transactions:Object},setup(c){const r=c;return(p,A)=>(o(),n(a,null,[d(h(u),null,{default:x(()=>[g]),_:1}),t("div",f,[t("div",w,[t("div",C,[t("div",b,[t("table",v,[S,t("tbody",null,[(o(!0),n(a,null,i(c.balance_transactions,e=>(o(),n("tr",B,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900",textContent:l(e.id)},null,8,k),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:l(e.client.full_name)},null,8,D),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:l(e.sum)},null,8,E),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:l(e.type)},null,8,F),t("td",N,[t("form",null,[t("select",{id:"category",class:"border border-gray-200 p-2 w-full rounded-2xl",name:"category",onChange:m(s=>p.handleStatus(s,e.id),["prevent"])},[(o(!0),n(a,null,i(r.transaction_statuses,s=>_((o(),n("option",{selected:s===e.status,value:s,textContent:l(s)},null,8,V)),[[y,s!=="SUCCESS"]])),256))],40,T)])]),j]))),256))])])])])])])],64))}};export{O as default};
