import{r,o as s,c,b as t,F as g,i as y,t as n,d,j as x,f as p,O as w,A as v}from"./app-f4cf12d7.js";import b from"./Edit-738ff0fc.js";import{M as C}from"./Modal-3a27b5ad.js";/* empty css            */const k={class:"flex flex-col"},A={class:"sm:mx-0.5 lg:mx-0.5"},B={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},M={class:"overflow-hidden"},E={class:"min-w-full"},D=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Имя(Русском) "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Имя(Английском) "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Имя(Израильском) "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Флаг "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Action ")])],-1),F={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 hover:cursor-pointer"},N=["textContent"],O=["textContent"],S=["textContent"],V=["textContent"],j={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"},L=["src"],T={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"},$=["onClick"],q=t("i",{class:"fa fa-edit text-white"},null,-1),z=[q],G=["onClick"],H=t("i",{class:"fa fa-trash text-white"},null,-1),I=[H],U={__name:"Table",props:{countries:Array},setup(m){const h=m,f=v({}),o=r(!1),l=r(null),_=a=>{w.delete("/countries/"+a),f.success("Successfully deleted")},u=a=>{l.value=a,o.value=!0},i=()=>{o.value=!1,l.value=null};return(a,J)=>(s(),c("div",k,[t("div",A,[t("div",B,[t("div",M,[t("table",E,[D,t("tbody",null,[(s(!0),c(g,null,y(h.countries,e=>(s(),c("tr",F,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900",textContent:n(e.id)},null,8,N),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:n(e.name)},null,8,O),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:n(e.name_common)},null,8,S),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:n(e.name_official)},null,8,V),t("td",j,[t("img",{src:`/storage/${e==null?void 0:e.flag}`,alt:"flag",class:"w-full h-10"},null,8,L)]),t("td",T,[t("button",{class:"btn-edit mr-2",onClick:d(()=>u(e.id),["prevent"])},z,8,$),t("button",{class:"btn-danger",onClick:d(()=>_(e.id),["prevent"])},I,8,G),o.value&&e.id===l.value?(s(),x(C,{key:0,onClose:i})):p("",!0),o.value&&e.id===l.value?(s(),x(b,{key:1,country:e,onClose:i},null,8,["country"])):p("",!0)])]))),256))])])])])])]))}};export{U as default};
