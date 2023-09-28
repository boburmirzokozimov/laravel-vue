import{r as m,o as n,c as p,b as t,F as b,f as C,t as a,a as i,N as h,q as k,w as y,d as x,k as d,h as u,O as S,A as $}from"./app-f965cbb4.js";import B from"./Edit-a897bb56.js";import{M as f}from"./Modal-6c972b8f.js";import N from"./SendMessage-3bad41a6.js";import A from"./Filter-dc8a44de.js";import{P as M}from"./Paginator-d215deb9.js";/* empty css            *//* empty css                                                              */import"./lodash-99586ae5.js";import"./maska-6f10db43.js";const L={class:"flex flex-col"},O={class:"sm:mx-0.5 lg:mx-0.5"},j={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},E={class:"overflow-hidden"},F={class:"min-w-full"},P=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Full Name "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Phone "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Balance "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Last Seen "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"}," Active "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4",scope:"col"})])],-1),V={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},D=["textContent"],I=["textContent"],q=["textContent"],z=["textContent"],T={class:"text-sm text-gray-900 font-light py-4 whitespace-nowrap"},U=["textContent"],G={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},H=t("i",{class:"fa fa-eye text-white"},null,-1),J=["onClick"],K=t("i",{class:"fa fa-edit text-white"},null,-1),Q=[K],R=["onClick"],W=t("i",{class:"fa fa-envelope text-white"},null,-1),X=[W],Y=["onClick"],Z=t("i",{class:"fa fa-trash text-white"},null,-1),tt=[Z],et={__name:"ClientTable",props:{clients:Array},setup(_){const c=$({}),s=m(!1),o=m(null),g=l=>{S.delete("/clients/"+l),c.success("Successfully deleted")},v=l=>{o.value=l,s.value=!0},w=l=>{o.value="message_"+l,s.value=!0},r=()=>{s.value=!1,o.value=null};return(l,lt)=>(n(),p("div",L,[t("div",O,[t("div",j,[t("div",E,[t("table",F,[P,t("tbody",null,[(n(!0),p(b,null,C(_.clients,e=>(n(),p("tr",V,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900",textContent:a(e.id)},null,8,D),i(h,{href:`/clients/${e.id}`,as:"td",class:"cursor-pointer text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:a(e.full_name)},null,8,["href","textContent"]),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:a(e.phone)},null,8,I),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:a(e.balance.toLocaleString("en-US"))},null,8,q),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:a(e.last_visited)},null,8,z),t("td",T,[t("span",{class:k([e.is_active?"bg-green-600":"bg-red-600","px-3 py-1 rounded-md text-white"]),textContent:a(e.is_active?"Active":"Inactive")},null,10,U)]),t("td",G,[i(h,{href:`/clients/${e.id}`,as:"button",class:"btn-edit mr-2"},{default:y(()=>[H]),_:2},1032,["href"]),t("button",{class:"btn-edit mr-2",onClick:x(()=>v(e.id),["prevent"])},Q,8,J),t("button",{class:"btn-secondary mr-2",onClick:x(()=>w(e.id),["prevent"])},X,8,R),t("button",{class:"btn-danger",onClick:x(()=>g(e.id),["prevent"])},tt,8,Y),s.value&&e.id===o.value?(n(),d(f,{key:0,onClose:r})):u("",!0),s.value&&"message_"+e.id===o.value?(n(),d(f,{key:1,onClose:r})):u("",!0),s.value&&e.id===o.value?(n(),d(B,{key:2,client:e,onClose:r},null,8,["client"])):u("",!0),s.value&&"message_"+e.id===o.value?(n(),d(N,{key:3,client:e,onClose:r},null,8,["client"])):u("",!0)])]))),256))])])])])])]))}},st={class:"flex justify-between items-center"},ot=t("div",null,[t("h1",{class:"text-3xl text-center"}," Clients ")],-1),nt=t("i",{class:"fa fa-user-plus text-white"},null,-1),mt={__name:"Index",props:{clients:Object,filters:Object},setup(_){const c=_;return(s,o)=>(n(),p("div",null,[t("div",st,[ot,t("div",null,[i(h,{class:"btn-success",href:"/clients/create"},{default:y(()=>[nt]),_:1})])]),i(A,{filters:c.filters},null,8,["filters"]),i(et,{clients:c.clients.data},null,8,["clients"]),i(M,{links:c.clients.links},null,8,["links"])]))}};export{mt as default};