import{M as y}from"./Modal-113041e8.js";import _ from"./InfoPopUp-dab05825.js";import{r as p,o as s,c,b as t,F as g,i as f,t as o,k as d,f as x,O as C}from"./app-e89b8bfc.js";/* empty css            */const v={class:"flex flex-col"},w={class:"sm:mx-0.5 lg:mx-0.5"},b={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},k={class:"overflow-hidden"},B={class:"min-w-full"},S=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Date "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Sum "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Type "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Status "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Action ")])],-1),E={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},O=["textContent"],D=["textContent"],M=["textContent"],N=["textContent"],j=["textContent"],A={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},F=["onClick"],L=["onClick"],P={__name:"BalanceRequestTable",props:{balance_requests:Object,transaction_statuses:Object},setup(u){const n=p(!1),a=p(null),m=l=>{a.value=l,n.value=!0},r=()=>{n.value=!1,a.value=null},h=(l,i)=>{C.post(`/balanceRequests/${i}`,{status:l},{onSuccess:()=>{toaster.success("Статус изменён")},onError:e=>{toaster.error(e.message)},preserveScroll:!0})};return(l,i)=>(s(),c("div",v,[t("div",w,[t("div",b,[t("div",k,[t("table",B,[S,t("tbody",null,[(s(!0),c(g,null,f(u.balance_requests,e=>(s(),c("tr",E,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900",textContent:o(e.id)},null,8,O),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:o(e.created_at)},null,8,D),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:o(e.sum)},null,8,M),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:o(e.type)},null,8,N),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:o(e.status)},null,8,j),t("td",A,[t("button",{class:"btn-edit",onClick:()=>m(e.id)},"Просмотр деталей ",8,F),t("button",{class:"btn-danger",onClick:R=>h("CANCELED",e.id)},"Отменить",8,L),n.value&&e.id===a.value?(s(),d(y,{key:0,onClose:r})):x("",!0),n.value&&e.id===a.value?(s(),d(_,{key:1,balance_request:e,onClose:r},null,8,["balance_request"])):x("",!0)])]))),256))])])])])])]))}};export{P as default};
