import{r,o,c,b as t,F as k,i as S,t as n,n as u,d as h,k as m,f,O as y,A as B}from"./app-13a5847b.js";import{M as E}from"./Modal-ae9c1667.js";import M from"./Edit-c234f528.js";/* empty css            */const O={class:"flex flex-col"},D={class:""},N={class:"py-2 inline-block mx-auto w-full"},j={class:"overflow-hidden"},A={class:"min-w-full"},F=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," ФИО "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Дата последнего входа "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Номер телефона "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Страна "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Статус "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Блокировать "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Дейтсвие ")])],-1),V={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 text-left"},z=["textContent"],L=["textContent"],T=["textContent"],$=["textContent"],q=["textContent"],G={class:"text-sm text-gray-900 font-light py-4 whitespace-nowrap text-center"},H=["textContent"],I={class:"text-sm text-gray-900 font-light py-4 whitespace-nowrap text-center"},J=["onClick"],K={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},P=["onClick"],Q=["onClick"],Z={__name:"Table",props:{couriers:Object,countries:Object},setup(_){const i=_,d=B({}),l=r(!1),a=r(null),g=s=>{y.delete("/couriers/"+s),d.success("Successfully deleted")},b=s=>{a.value="edit"+s,l.value=!0},v=s=>{y.post("/couriers/"+s.id+"/status",{status:s.status==="active"||s.status==="inactive"?"blocked":"active"},{onSuccess:()=>{d.success("Successfully edited")},preserveScroll:!0})},x=()=>{l.value=!1,a.value=null},C=s=>s==="active"?"Активный":s==="inactive"?"Неактивный":"Блокированный",w=s=>s==="active"?"btn-success":s==="inactive"?"btn-secondary":"btn-danger";return(s,R)=>(o(),c("div",O,[t("div",D,[t("div",N,[t("div",j,[t("table",A,[F,t("tbody",null,[(o(!0),c(k,null,S(i.couriers,e=>{var p;return o(),c("tr",V,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900",textContent:n(e.id)},null,8,z),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.fullName)},null,8,L),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.lastSeen)},null,8,T),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.phone)},null,8,$),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(`${(p=e==null?void 0:e.country)==null?void 0:p.slice(0,20)}...`)},null,8,q),t("td",G,[t("button",{class:u(w(e.status)),type:"button",textContent:n(C(e.status))},null,10,H)]),t("td",I,[t("button",{class:u([e.status==="blocked"?"btn-success":"btn-danger","mx-auto"]),onClick:()=>v(e)},n(e.status==="blocked"?"Разблокировать":"Блокировать"),11,J)]),t("td",K,[t("button",{class:"btn-edit mr-2",onClick:h(()=>b(e.id),["prevent"])}," Edit ",8,P),t("button",{class:"btn-danger",onClick:h(()=>g(e.id),["prevent"])}," Delete ",8,Q),l.value&&"edit"+e.id===a.value?(o(),m(E,{key:0,onClose:x})):f("",!0),l.value&&"edit"+e.id===a.value?(o(),m(M,{key:1,countries:i.countries,courier:e,onClose:x},null,8,["countries","courier"])):f("",!0)])])}),256))])])])])])]))}};export{Z as default};
