import{r as _,o as s,c as o,a as u,w as v,u as k,b as t,F as d,f,Z as S,t as n,d as b,e as E,i as B,h as p,k as g,O,A as I}from"./app-f6319974.js";import{P as N}from"./Paginator-60da1e1b.js";import A from"./Filter-2fac232a.js";import D from"./InfoPopUp-d85b9192.js";import{M}from"./Modal-576eb785.js";/* empty css            */import"./lodash-6cac960e.js";/* empty css                                                              */const T=t("title",null,"Balance Transactions",-1),U={class:"flex flex-col"},V={class:"sm:mx-0.5 lg:mx-0.5"},j={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},F={class:"overflow-hidden"},L={class:"min-w-full"},P=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Client "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Sum "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Type "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Status "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"})])],-1),$={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},q=["textContent"],G=["textContent"],H=["textContent"],R=["textContent"],W=["textContent"],Z={key:2,class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},z=["onChange"],J=["selected","value","textContent"],K={key:3,class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap bg-green-500",textContent:"SUCCESS"},Q={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},X=["onClick"],Y=t("i",{class:"fa fa-eye text-white"},null,-1),tt=[Y],et=["onClick"],st=t("i",{class:"fa fa-remove text-white"},null,-1),ot=[st],pt={__name:"Balance",props:{balance_transactions:Object,transaction_statuses:Object,filters:Object},setup(a){const C=a,x=I({}),r=_(!1),c=_(null),m=(i,y)=>{O.post(`/transactions/${y}/status`,{status:i},{onSuccess:()=>{x.success("Статус изменён")},onError:e=>{x.error(e.message)},preserveScroll:!0})},w=i=>{c.value=i,r.value=!0},h=()=>{r.value=!1,c.value=null};return(i,y)=>(s(),o(d,null,[u(k(S),null,{default:v(()=>[T]),_:1}),u(A,{filters:a.filters},null,8,["filters"]),t("div",U,[t("div",V,[t("div",j,[t("div",F,[t("table",L,[P,t("tbody",null,[(s(!0),o(d,null,f(a.balance_transactions.data,e=>(s(),o("tr",$,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900",textContent:n(e.id)},null,8,q),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.client_name)},null,8,G),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.sum)},null,8,H),e.metal_or_crypto_type?(s(),o("td",{key:1,class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.metal_or_crypto_type)},null,8,W)):(s(),o("td",{key:0,class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.type)},null,8,R)),e.status!=="SUCCESS"?(s(),o("td",Z,[t("form",null,[t("select",{id:"category",class:"text-center border border-gray-200 p-2 w-full rounded-2xl",name:"category",onChange:b(l=>m(l.target.value,e.id),["prevent"])},[(s(!0),o(d,null,f(C.transaction_statuses,l=>E((s(),o("option",{selected:l===e.status,value:l,class:"text-center",textContent:n(l)},null,8,J)),[[B,l!=="SUCCESS"]])),256))],40,z)])])):(s(),o("td",K)),t("td",Q,[t("button",{class:"btn-edit mr-2",onClick:()=>w(e.id)},tt,8,X),e.status==="HOLD"||e.status==="WAITING"||e.status==="VERIFICATION"?(s(),o("button",{key:0,class:"btn-danger",onClick:l=>m("CANCELED",e.id)},ot,8,et)):p("",!0),r.value&&e.id===c.value?(s(),g(M,{key:1,style:{"background-color":"rgba(0, 0, 0, 0.15)"},onClose:h})):p("",!0),r.value&&e.id===c.value?(s(),g(D,{key:2,balance_request:e,onClose:h},null,8,["balance_request"])):p("",!0)])]))),256))])])])])])]),u(N,{links:a.balance_transactions.links},null,8,["links"])],64))}};export{pt as default};
