import{M as d}from"./Modal-f271aa37.js";import y from"./ActivateCreditCard-ed277c47.js";import _ from"./EditCreditCardRequest-57216239.js";import{r as h,o as s,c as x,b as t,F as g,i as v,t as n,f as c,k as p}from"./app-015141e4.js";import"./maska-6f10db43.js";/* empty css            */const w={class:"flex flex-col"},C={class:"sm:mx-0.5 lg:mx-0.5"},b={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},k={class:"overflow-hidden"},B={class:"min-w-full"},j=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Фамилия "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Имя "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Отчество "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Номер телефона "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Дата рождения "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Скан паспорта "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Селфи с паспортом "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Дата создание заявки "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Действие ")])],-1),M={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},$=["textContent"],A=["textContent"],E=["textContent"],F=["textContent"],N=["textContent"],O=["textContent"],R={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},V=["src"],D={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},L=["src"],S=["textContent"],T={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},z={class:""},G=["onClick"],H=t("i",{class:"fa fa-edit text-white"},null,-1),I=[H],J=["onClick"],K=t("i",{class:"fa fa-check text-white"},null,-1),P=[K],tt={__name:"CreditCardRequestTable",props:{credit_card_requests:Object,credit_card_requests_anonymous:Object},setup(r){const m=r,o=h(!1),l=h(null),u=a=>{l.value=a,o.value=!0},f=a=>{l.value="activate_"+a,o.value=!0},i=()=>{o.value=!1,l.value=null};return(a,Q)=>(s(),x("div",w,[t("div",C,[t("div",b,[t("div",k,[t("table",B,[j,t("tbody",null,[(s(!0),x(g,null,v(r.credit_card_requests,e=>(s(),x("tr",M,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900",textContent:n(e.id)},null,8,$),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.surname)},null,8,A),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.name)},null,8,E),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.middle_name)},null,8,F),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.phone)},null,8,N),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.birth_date)},null,8,O),t("td",R,[t("img",{src:`/storage/${e.scan_passport}`,alt:"",class:"rounded-full w-10 h-10 bg-cover object-center"},null,8,V)]),t("td",D,[t("img",{src:`/storage/${e.selfie_passport}`,alt:"",class:"rounded-full w-10 h-10 bg-cover object-center"},null,8,L)]),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.created_at)},null,8,S),t("td",T,[t("div",z,[t("button",{class:"btn-edit mr-2",onClick:()=>u(e.id)},I,8,G),a.$page.props.is_manager?(s(),x("button",{key:0,class:"mt-1 btn-success",onClick:()=>f(e.id)},P,8,J)):c("",!0)]),o.value&&e.id===l.value?(s(),p(d,{key:0,onClose:i})):c("",!0),o.value&&"activate_"+e.id===l.value?(s(),p(d,{key:1,onClose:i})):c("",!0),o.value&&e.id===l.value?(s(),p(_,{key:2,client:m.client,credit_card_request:e,onClose:i},null,8,["client","credit_card_request"])):c("",!0),o.value&&"activate_"+e.id===l.value?(s(),p(y,{key:3,client:m.client,credit_card_request:e,onClose:i},null,8,["client","credit_card_request"])):c("",!0)])]))),256))])])])])])]))}};export{tt as default};
