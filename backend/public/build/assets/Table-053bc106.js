import{r,o as s,c as a,b as t,F as f,i as y,t as c,d,k as x,f as p,O as g,A as b}from"./app-d5cbf76a.js";import v from"./Edit-2a213695.js";import{M as w}from"./Modal-6a5fe8ec.js";/* empty css            */const C={class:"flex flex-col"},k={class:"sm:mx-0.5 lg:mx-0.5"},A={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},B={class:"overflow-hidden"},E={class:"min-w-full"},M=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Расчетный счет "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Кошелёк "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Action ")])],-1),O={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 hover:cursor-pointer"},D=["textContent"],j=["textContent"],F=["textContent"],N={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"},S=["onClick"],V=["onClick"],H={__name:"Table",props:{keys:Array},setup(u){const m=b({}),o=r(!1),l=r(null),h=n=>{g.delete("/keys/"+n),m.success("Successfully deleted")},_=n=>{l.value=n,o.value=!0},i=()=>{o.value=!1,l.value=null};return(n,L)=>(s(),a("div",C,[t("div",k,[t("div",A,[t("div",B,[t("table",E,[M,t("tbody",null,[(s(!0),a(f,null,y(u.keys,e=>(s(),a("tr",O,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900",textContent:c(e.id)},null,8,D),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:c(e.account_number)},null,8,j),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left",textContent:c(e.wallet_number)},null,8,F),t("td",N,[t("button",{class:"btn-edit mr-2",onClick:d(()=>_(e.id),["prevent"])}," Edit ",8,S),t("button",{class:"btn-danger",onClick:d(()=>h(e.id),["prevent"])}," Delete ",8,V),o.value&&e.id===l.value?(s(),x(w,{key:0,onClose:i})):p("",!0),o.value&&e.id===l.value?(s(),x(v,{key:1,keyObject:e,onClose:i},null,8,["keyObject"])):p("",!0)])]))),256))])])])])])]))}};export{H as default};
