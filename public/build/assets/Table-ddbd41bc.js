import{M as m}from"./Modal-2cc2044c.js";import y from"./Edit-ac638e7b.js";import{r as d,o as s,c as n,b as t,F as g,f as w,t as o,h as a,k as u,O as C}from"./app-93756fd7.js";/* empty css                                                              *//* empty css            */const b={class:"flex flex-col"},v={class:"sm:mx-0.5 lg:mx-0.5"},k={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},S={class:"overflow-hidden"},B={class:"min-w-full"},E=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Владелец "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Тип Карты "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Количество "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Статус "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Сумма "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Вид "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-center",scope:"col"}," Действие ")])],-1),M={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},N=["textContent"],O=["textContent"],F=["textContent"],I=["textContent"],L=["textContent"],U=["textContent"],V=["textContent"],j={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left inline-block"},q={class:"inline-block"},A=["onClick"],D=t("i",{class:"fa fa-edit text-white"},null,-1),G=[D],W=["onClick"],$=t("i",{class:"fa fa-remove text-white"},null,-1),z=[$],R={__name:"Table",props:{metalTransactions:Object},setup(h){const _=l=>{x.value=l,c.value=!0},c=d(!1),x=d(null),i=()=>{c.value=!1,x.value=null},f=l=>{C.post(`/crypto/${l.client_id}/`+l.id+"/cancel",{onSuccess:()=>{toaster.success("Successfully canceled")},preserveScroll:!0,onError:r=>{toaster.error(r.message)}})};return(l,r)=>(s(),n("div",b,[t("div",v,[t("div",k,[t("div",S,[t("table",B,[E,t("tbody",null,[(s(!0),n(g,null,w(h.metalTransactions,e=>{var p;return s(),n("tr",M,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-left",textContent:o(e.id)},null,8,N),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.client_name)},null,8,O),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.sort)},null,8,F),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.quantity)},null,8,I),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.status)},null,8,L),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o((p=e==null?void 0:e.sum)==null?void 0:p.toLocaleString("en-US"))},null,8,U),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.withdraw?"Продал":"Купил")},null,8,V),t("td",j,[t("div",q,[e.status!=="SUCCESS"?(s(),n("button",{key:0,class:"btn-edit mr-2",onClick:()=>_(e.id)},G,8,A)):a("",!0),e.status==="WAITING"?(s(),n("button",{key:1,class:"btn-danger",onClick:()=>f(e)},z,8,W)):a("",!0)]),c.value&&e.id===x.value?(s(),u(m,{key:0,onClose:i})):a("",!0),c.value&&e.id===x.value?(s(),u(y,{key:1,metalTransaction:e,onClose:i},null,8,["metalTransaction"])):a("",!0)])])}),256))])])])])])]))}};export{R as default};
