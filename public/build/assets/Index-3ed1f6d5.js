import{r as p,o,c as r,b as t,F as g,i as v,t as s,a as c,N as _,n as w,d as m,k as u,f as h,O as C,A as b,w as k,j as N}from"./app-0440f92d.js";import A from"./Edit-77d48676.js";import{M as B}from"./Modal-985da767.js";import $ from"./Filter-634129b5.js";import{P as j}from"./Paginator-1b1bb916.js";/* empty css            */import"./lodash-3241f662.js";import"./maska-6f10db43.js";const E={class:"flex flex-col"},M={class:"sm:mx-0.5 lg:mx-0.5"},O={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},V={class:"overflow-hidden"},D={class:"min-w-full"},F=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Full Name "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Phone "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Balance "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Last Seen "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Active "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Action ")])],-1),L={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 hover:cursor-pointer"},P=["textContent"],S=["textContent"],I=["textContent"],T=["textContent"],z={class:"text-sm text-gray-900 font-light py-4 whitespace-nowrap"},q=["textContent"],G={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},H=["onClick"],J=["onClick"],K={__name:"ClientTable",props:{clients:Array},setup(d){const n=b({}),l=p(!1),a=p(null),f=i=>{C.delete("/clients/"+i),n.success("Successfully deleted")},y=i=>{a.value=i,l.value=!0},x=()=>{l.value=!1,a.value=null};return(i,U)=>(o(),r("div",E,[t("div",M,[t("div",O,[t("div",V,[t("table",D,[F,t("tbody",null,[(o(!0),r(g,null,v(d.clients,e=>(o(),r("tr",L,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900",textContent:s(e.id)},null,8,P),c(_,{href:`/clients/${e.id}`,as:"td",class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:s(e.full_name)},null,8,["href","textContent"]),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:s(e.phone)},null,8,S),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:s(e.balance)},null,8,I),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:s(e.last_visited)},null,8,T),t("td",z,[t("span",{class:w([e.is_active?"bg-green-600":"bg-red-600","px-3 py-1 rounded-md text-white"]),textContent:s(e.is_active?"Active":"Inactive")},null,10,q)]),t("td",G,[t("button",{class:"btn-edit mr-2",onClick:m(()=>y(e.id),["prevent"])}," Edit ",8,H),t("button",{class:"btn-danger",onClick:m(()=>f(e.id),["prevent"])}," Delete ",8,J),l.value&&e.id===a.value?(o(),u(B,{key:0,onClose:x})):h("",!0),l.value&&e.id===a.value?(o(),u(A,{key:1,client:e,onClose:x},null,8,["client"])):h("",!0)])]))),256))])])])])])]))}},Q={class:"flex justify-between items-center"},R=t("div",null,[t("h1",{class:"text-3xl text-center"}," Clients ")],-1),nt={__name:"Index",props:{clients:Object,filters:Object},setup(d){const n=d;return(l,a)=>(o(),r("div",null,[t("div",Q,[R,t("div",null,[c(_,{class:"btn-success",href:"/clients/create"},{default:k(()=>[N(" Create ")]),_:1})])]),c($,{filters:n.filters},null,8,["filters"]),c(K,{clients:n.clients.data},null,8,["clients"]),c(j,{links:n.clients.links},null,8,["links"])]))}};export{nt as default};
