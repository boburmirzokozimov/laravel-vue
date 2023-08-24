import{r as _,o as n,c as i,b as t,F as b,i as v,t as o,n as f,d as y,f as d,k as p,O as C,A as k,w as A,j as N,N as B,a as x}from"./app-13a5847b.js";import j from"./Edit-0cd740d5.js";import{M as O}from"./Modal-ae9c1667.js";import"./lodash-2eb18fc9.js";import{P as $}from"./Paginator-44623e18.js";import E from"./Filter-959c3fe5.js";/* empty css            */const M={class:"flex flex-col"},V={class:"sm:mx-0.5 lg:mx-0.5"},D={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},F={class:"overflow-hidden"},L={class:"min-w-full"},P=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Full Name "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Role "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Last Seen "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Phone "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Country "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Active "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Banned "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Action ")])],-1),S={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},I=["textContent"],T=["textContent"],U=["textContent"],z=["textContent"],R=["textContent"],q=["textContent"],G={class:"text-sm text-gray-900 font-light py-4 whitespace-nowrap"},H=["textContent"],J={class:"text-sm text-gray-900 font-light py-4 whitespace-nowrap"},K=["textContent"],Q={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},W=["onClick"],X=["onClick"],Y={__name:"Table",props:{users:Array,countries:Array,roles:Array},setup(l){const s=l,m=k({}),a=_(!1),r=_(null),g=c=>{C.delete("/users/"+c),m.success("Successfully deleted")},w=c=>{r.value=c,a.value=!0},u=()=>{a.value=!1,r.value=null};return(c,et)=>(n(),i("div",M,[t("div",V,[t("div",D,[t("div",F,[t("table",L,[P,t("tbody",null,[(n(!0),i(b,null,v(l.users,e=>{var h;return n(),i("tr",S,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900",textContent:o(e.id)},null,8,I),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:o(e.full_name)},null,8,T),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:o(e==null?void 0:e.role.name.toUpperCase())},null,8,U),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:o(e.last_visited)},null,8,z),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:o(e.phone)},null,8,R),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:o(`${(h=e==null?void 0:e.country)==null?void 0:h.slice(0,20)}...`)},null,8,q),t("td",G,[t("span",{class:f([e.is_active?"bg-green-600":"bg-red-600","px-3 py-1 rounded-md text-white"]),textContent:o(e.is_active?"Active":"Inactive")},null,10,H)]),t("td",J,[t("span",{class:f([e.is_banned?"bg-green-600":"bg-red-600","px-3 py-1 mx-auto rounded-md text-white"]),textContent:o(e.is_banned?"Banned":"Not Banned")},null,10,K)]),t("td",Q,[t("button",{class:"btn-edit mr-2",onClick:y(()=>w(e.id),["prevent"])}," Edit ",8,W),e.id!==c.$page.props.auth.user.id?(n(),i("button",{key:0,class:"btn-danger",onClick:y(()=>g(e.id),["prevent"])}," Delete ",8,X)):d("",!0),a.value&&e.id===r.value?(n(),p(O,{key:1,onClose:u})):d("",!0),a.value&&e.id===r.value?(n(),p(j,{key:2,countries:s.countries,user:e,onClose:u},null,8,["countries","user"])):d("",!0)])])}),256))])])])])])]))}},Z={class:"flex justify-between items-center"},tt=t("div",null,[t("h1",{class:"text-3xl text-center"}," Users ")],-1),rt={__name:"Index",props:{users:Object,countries:Object,roles:Object,can:Array,filters:Object},setup(l){const s=l;return(m,a)=>(n(),i("div",null,[t("div",Z,[tt,t("div",null,[l.can.create_user?(n(),p(B,{key:0,class:"btn-success",href:"/users/create"},{default:A(()=>[N(" Create ")]),_:1})):d("",!0)])]),x(E,{countries:s.countries,filters:s.filters,roles:s.roles},null,8,["countries","filters","roles"]),x(Y,{countries:s.countries,roles:l.roles,users:s.users.data},null,8,["countries","roles","users"]),x($,{links:s.users.links},null,8,["links"])]))}};export{rt as default};
