import u from"./MetalBalance-067973c0.js";import d from"./Table-822ced9b.js";import{P as b}from"./Paginator-357480f5.js";import{r as s,o as t,c as a,F as r,i as c,b as k,a as o,k as g,f as p,n as f,t as x}from"./app-015141e4.js";import"./Modal-f271aa37.js";import"./Edit-5e266a69.js";/* empty css            */const y={class:"flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"},_=["onClick","textContent"],$={__name:"Index",props:{metals:Object,client:Object,metalTransactions:Object},setup(n){const i=n,l=s("BTC"),m=s([{name:"BTC"},{name:"ETH"},{name:"BNB"},{name:"ADA"},{name:"DOT"}]);return(B,C)=>(t(),a(r,null,[(t(!0),a(r,null,c(n.metals,e=>(t(),a(r,null,[e.card_type===l.value?(t(),g(u,{key:0,balance:e,client:i.client},null,8,["balance","client"])):p("",!0)],64))),256)),k("ul",y,[(t(!0),a(r,null,c(m.value,e=>(t(),a("li",{class:f([l.value===e.name&&"bg-white","cursor-pointer inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500"]),"aria-current":"page",onClick:v=>l.value=e.name,textContent:x(e.name)},null,10,_))),256))]),o(d,{"metal-transactions":n.metalTransactions.data},null,8,["metal-transactions"]),o(b,{links:n.metalTransactions.links},null,8,["links"])],64))}};export{$ as default};
