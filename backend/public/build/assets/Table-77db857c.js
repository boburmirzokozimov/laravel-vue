import{r as x,o,c,b as t,F as y,i as f,t as s,d as r,k as d,f as p,O as g,A as w}from"./app-12bc5e3c.js";import C from"./Edit-e1482fa7.js";import{M as v}from"./Modal-011937d5.js";/* empty css            */import"./maska-6f10db43.js";const k={class:"flex flex-col"},b={class:"sm:mx-0.5 lg:mx-0.5"},A={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},E={class:"overflow-hidden"},B={class:"min-w-full"},M=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Address "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Full Address "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Latitude "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Longitude "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Contact Number "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Contact Email "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Working hours "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Action ")])],-1),D={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 hover:cursor-pointer"},F=["textContent"],L=["textContent"],N=["textContent"],O=["textContent"],S=["textContent"],V=["textContent"],T=["textContent"],W=["textContent"],j={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},q=["onClick"],z=["onClick"],Q={__name:"Table",props:{branches:Array},setup(m){const u=w({}),l=x(!1),n=x(null),h=a=>{g.delete("/branches/"+a),u.success("Successfully deleted")},_=a=>{n.value=a,l.value=!0},i=()=>{l.value=!1,n.value=null};return(a,G)=>(o(),c("div",k,[t("div",b,[t("div",A,[t("div",E,[t("table",B,[M,t("tbody",null,[(o(!0),c(y,null,f(m.branches,e=>(o(),c("tr",D,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900",textContent:s(e.id)},null,8,F),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:s(e.address)},null,8,L),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:s(e.full_address)},null,8,N),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:s(e.lat)},null,8,O),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:s(e.lon)},null,8,S),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:s(e.contact_number)},null,8,V),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:s(e.contact_email)},null,8,T),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:s(e.working_hours)},null,8,W),t("td",j,[t("button",{class:"btn-edit mr-2",onClick:r(()=>_(e.id),["prevent"])}," Edit ",8,q),t("button",{class:"btn-danger",onClick:r(()=>h(e.id),["prevent"])}," Delete ",8,z),l.value&&e.id===n.value?(o(),d(v,{key:0,onClose:i})):p("",!0),l.value&&e.id===n.value?(o(),d(C,{key:1,branch:e,onClose:i},null,8,["branch"])):p("",!0)])]))),256))])])])])])]))}};export{Q as default};
