import{M as _}from"./Modal-6a5fe8ec.js";import y from"./ActivateCreditCard-01ef4c36.js";import{r as x,o as s,c as l,b as t,F as f,i as g,t as c,f as i,k as m}from"./app-d5cbf76a.js";import"./maska-6f10db43.js";/* empty css            */const v={class:"flex flex-col"},C={class:"sm:mx-0.5 lg:mx-0.5"},b={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},w={class:"overflow-hidden"},k={class:"min-w-full"},B=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Предпочитаемое Фамилия "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Предпочитаемое Имя "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Дата создание заявки "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Действие ")])],-1),A={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},M=["textContent"],F=["textContent"],N=["textContent"],V=["textContent"],j={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},D={class:"flex"},E=["onClick"],L=["onClick"],G={__name:"CreditCardRequestTableAnonymous",props:{credit_card_requests_anonymous:Object},setup(r){const u=r,o=x(!1),n=x(null),d=a=>{n.value=a,o.value=!0},h=a=>{n.value="activate_"+a,o.value=!0},p=()=>{o.value=!1,n.value=null};return(a,O)=>(s(),l("div",v,[t("div",C,[t("div",b,[t("div",w,[t("table",k,[B,t("tbody",null,[(s(!0),l(f,null,g(r.credit_card_requests_anonymous,e=>(s(),l("tr",A,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900",textContent:c(e.id)},null,8,M),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:c(e.anonymous_surname)},null,8,F),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:c(e.anonymous_name)},null,8,N),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:c(e.created_at)},null,8,V),t("td",j,[t("div",D,[t("button",{class:"btn-edit w-1/2 mr-2",onClick:()=>d(e.id)}," Редактировать ",8,E),a.$page.props.is_manager?(s(),l("button",{key:0,class:"btn-success w-1/2",onClick:()=>h(e.id)},"Активоровать ",8,L)):i("",!0)]),o.value&&"activate_"+e.id===n.value?(s(),m(_,{key:0,onClose:p})):i("",!0),o.value&&"activate_"+e.id===n.value?(s(),m(y,{key:1,client:u.client,credit_card_request:e,onClose:p},null,8,["client","credit_card_request"])):i("",!0)])]))),256))])])])])])]))}};export{G as default};
