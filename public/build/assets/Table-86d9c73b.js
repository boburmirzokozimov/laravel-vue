import{M as f}from"./Modal-468cf0ea.js";import m from"./Edit-b26ef953.js";import{r as p,o as s,c as n,b as t,F as y,i as g,t as o,f as x,k as d,O as w}from"./app-47eeaa01.js";/* empty css            */const C={class:"flex flex-col"},b={class:"sm:mx-0.5 lg:mx-0.5"},v={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},k={class:"overflow-hidden"},S={class:"min-w-full"},B=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Владелец "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Тип Карты "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Количество "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Статус "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Сумма "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Вид "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-center",scope:"col"}," Действие ")])],-1),E={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},M=["textContent"],N=["textContent"],O=["textContent"],F=["textContent"],I=["textContent"],V=["textContent"],j=["textContent"],q={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left inline-block"},A={class:"inline-block"},D=["onClick"],G=t("i",{class:"fa fa-edit text-white"},null,-1),L=[G],U=["onClick"],W=t("i",{class:"fa fa-remove text-white"},null,-1),$=[W],P={__name:"Table",props:{metalTransactions:Object},setup(u){const h=l=>{a.value=l,c.value=!0},c=p(!1),a=p(null),i=()=>{c.value=!1,a.value=null},_=l=>{w.post(`/crypto/${l.client_id}/`+l.id+"/cancel",{onSuccess:()=>{toaster.success("Successfully canceled")},preserveScroll:!0,onError:r=>{toaster.error(r.message)}})};return(l,r)=>(s(),n("div",C,[t("div",b,[t("div",v,[t("div",k,[t("table",S,[B,t("tbody",null,[(s(!0),n(y,null,g(u.metalTransactions,e=>(s(),n("tr",E,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-left",textContent:o(e.id)},null,8,M),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.client_name)},null,8,N),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.sort)},null,8,O),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.quantity)},null,8,F),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.status)},null,8,I),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.sum)},null,8,V),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.withdraw?"Продал":"Купил")},null,8,j),t("td",q,[t("div",A,[e.status!=="SUCCESS"?(s(),n("button",{key:0,class:"btn-edit mr-2",onClick:()=>h(e.id)},L,8,D)):x("",!0),e.status==="WAITING"?(s(),n("button",{key:1,class:"btn-danger",onClick:()=>_(e)},$,8,U)):x("",!0)]),c.value&&e.id===a.value?(s(),d(f,{key:0,onClose:i})):x("",!0),c.value&&e.id===a.value?(s(),d(m,{key:1,metalTransaction:e,onClose:i},null,8,["metalTransaction"])):x("",!0)])]))),256))])])])])])]))}};export{P as default};
