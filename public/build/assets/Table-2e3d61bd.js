import{r as i,o as s,c,b as t,F as f,i as y,t as o,d as x,k as d,f as p,O as g,A as b}from"./app-29ae78f3.js";import w from"./Edit-a8c6d231.js";import{M as C}from"./Modal-a0bd6a1a.js";/* empty css            */const v={class:"flex flex-col"},k={class:"sm:mx-0.5 lg:mx-0.5"},E={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},A={class:"overflow-hidden"},B={class:"min-w-full"},M=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Расчетный счет - SEPA "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Расчетный счет - SWIFT "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Кошелёк - ERC "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Кошелёк - TRC "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Action ")])],-1),O={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 hover:cursor-pointer"},S=["textContent"],D=["textContent"],F=["textContent"],T=["textContent"],j=["textContent"],N={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"},R=["onClick"],V=["onClick"],z={__name:"Table",props:{keys:Array},setup(u){const m=b({}),l=i(!1),n=i(null),_=a=>{g.delete("/keys/"+a),m.success("Successfully deleted")},h=a=>{n.value=a,l.value=!0},r=()=>{l.value=!1,n.value=null};return(a,I)=>(s(),c("div",v,[t("div",k,[t("div",E,[t("div",A,[t("table",B,[M,t("tbody",null,[(s(!0),c(f,null,y(u.keys,e=>(s(),c("tr",O,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900",textContent:o(e.id)},null,8,S),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.account_number_sepa)},null,8,D),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.account_number_swift)},null,8,F),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.wallet_number_erc)},null,8,T),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:o(e.wallet_number_trc)},null,8,j),t("td",N,[t("button",{class:"btn-edit mr-2",onClick:x(()=>h(e.id),["prevent"])}," Edit ",8,R),t("button",{class:"btn-danger",onClick:x(()=>_(e.id),["prevent"])}," Delete ",8,V),l.value&&e.id===n.value?(s(),d(C,{key:0,onClose:r})):p("",!0),l.value&&e.id===n.value?(s(),d(w,{key:1,keyObject:e,onClose:r},null,8,["keyObject"])):p("",!0)])]))),256))])])])])])]))}};export{z as default};
