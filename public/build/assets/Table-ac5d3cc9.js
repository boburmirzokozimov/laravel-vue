import{M as f}from"./Modal-6c972b8f.js";import _ from"./Edit-f2850a73.js";import{r as p,o as s,c as n,b as t,F as y,f as g,t as o,h as x,k as d,O as C}from"./app-f965cbb4.js";/* empty css                                                              *//* empty css            */const w={class:"flex flex-col"},b={class:"sm:mx-0.5 lg:mx-0.5"},v={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},k={class:"overflow-hidden"},S={class:"min-w-full"},B=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Тип Карты "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Количество "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Статус "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Сумма "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Вид "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-center",scope:"col"}," Действие ")])],-1),E={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},M=["textContent"],N=["textContent"],O=["textContent"],F=["textContent"],I=["textContent"],V=["textContent"],j={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left inline-block"},q={class:"inline-block"},A=["onClick"],D=["onClick"],z={__name:"Table",props:{metalTransactions:Object},setup(u){const h=l=>{a.value=l,c.value=!0},c=p(!1),a=p(null),r=()=>{c.value=!1,a.value=null},m=l=>{C.post(`/crypto/${l.client_id}/`+l.id+"/cancel",{onSuccess:()=>{toaster.success("Successfully canceled")},preserveScroll:!0,onError:i=>{toaster.error(i.message)}})};return(l,i)=>(s(),n("div",w,[t("div",b,[t("div",v,[t("div",k,[t("table",S,[B,t("tbody",null,[(s(!0),n(y,null,g(u.metalTransactions,e=>(s(),n("tr",E,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-left",textContent:o(e.id)},null,8,M),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.sort)},null,8,N),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.quantity)},null,8,O),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.status)},null,8,F),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.sum)},null,8,I),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.withdraw?"Продал":"Купил")},null,8,V),t("td",j,[t("div",q,[e.status!=="SUCCESS"?(s(),n("button",{key:0,class:"btn-edit mr-2",onClick:()=>h(e.id)}," Редактировать ",8,A)):x("",!0),e.status==="WAITING"?(s(),n("button",{key:1,class:"btn-danger",onClick:()=>m(e)}," Отменить ",8,D)):x("",!0)]),c.value&&e.id===a.value?(s(),d(f,{key:0,onClose:r})):x("",!0),c.value&&e.id===a.value?(s(),d(_,{key:1,metalTransaction:e,onClose:r},null,8,["metalTransaction"])):x("",!0)])]))),256))])])])])])]))}};export{z as default};