import{r as h,o,c as i,b as t,F as w,f as v,t as n,q as _,d as f,h as d,k as p,O as b,A as C,w as k,N as A,a as x}from"./app-98357828.js";import B from"./Edit-018011dc.js";import{M as N}from"./Modal-2142743b.js";import{P as O}from"./Paginator-bbb28962.js";import $ from"./Filter-d742948f.js";/* empty css            *//* empty css                                                              */import"./lodash-5778c43a.js";const j={class:"flex flex-col"},M={class:"sm:mx-0.5 lg:mx-0.5"},E={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},F={class:"overflow-hidden"},L={class:"min-w-full"},P=t("thead",{class:"bg-gray-200 border-b"},[t("tr",null,[t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Full Name "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Role "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Last Seen "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Phone "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Active "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Banned "),t("th",{class:"text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Action ")])],-1),S={class:"bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"},V=["textContent"],D=["textContent"],I=["textContent"],U=["textContent"],q=["textContent"],z={class:"text-sm text-gray-900 font-light py-4 whitespace-nowrap"},R=["textContent"],T={class:"text-sm text-gray-900 font-light py-4 whitespace-nowrap"},G=["textContent"],H={class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"},J=["onClick"],K=t("i",{class:"fa fa-edit text-white"},null,-1),Q=[K],W=["onClick"],X=t("i",{class:"fa fa-remove text-white"},null,-1),Y=[X],Z={__name:"Table",props:{users:Array,countries:Array,roles:Array},setup(l){const s=l,u=C({}),a=h(!1),r=h(null),y=c=>{b.delete("/users/"+c),u.success("Successfully deleted")},g=c=>{r.value=c,a.value=!0},m=()=>{a.value=!1,r.value=null};return(c,ot)=>(o(),i("div",j,[t("div",M,[t("div",E,[t("div",F,[t("table",L,[P,t("tbody",null,[(o(!0),i(w,null,v(l.users,e=>(o(),i("tr",S,[t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900",textContent:n(e.id)},null,8,V),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.full_name)},null,8,D),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e==null?void 0:e.role.name.toUpperCase())},null,8,I),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.last_visited)},null,8,U),t("td",{class:"text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap",textContent:n(e.phone)},null,8,q),t("td",z,[t("span",{class:_([e.is_active?"bg-green-600":"bg-red-600","px-3 py-1 rounded-md text-white"]),textContent:n(e.is_active?"Active":"Inactive")},null,10,R)]),t("td",T,[t("span",{class:_([e.is_banned?"bg-green-600":"bg-red-600","px-3 py-1 mx-auto rounded-md text-white"]),textContent:n(e.is_banned?"Banned":"Not Banned")},null,10,G)]),t("td",H,[t("button",{class:"btn-edit mr-2",onClick:f(()=>g(e.id),["prevent"])},Q,8,J),e.id!==c.$page.props.auth.user.id?(o(),i("button",{key:0,class:"btn-danger",onClick:f(()=>y(e.id),["prevent"])},Y,8,W)):d("",!0),a.value&&e.id===r.value?(o(),p(N,{key:1,onClose:m})):d("",!0),a.value&&e.id===r.value?(o(),p(B,{key:2,countries:s.countries,user:e,onClose:m},null,8,["countries","user"])):d("",!0)])]))),256))])])])])])]))}},tt={class:"flex justify-between items-center"},et=t("div",null,[t("h1",{class:"text-3xl text-center"}," Users ")],-1),st=t("i",{class:"fa-user-plus fa text-white"},null,-1),pt={__name:"Index",props:{users:Object,countries:Object,roles:Object,can:Array,filters:Object},setup(l){const s=l;return(u,a)=>(o(),i("div",null,[t("div",tt,[et,t("div",null,[l.can.create_user?(o(),p(A,{key:0,class:"btn-success",href:"/users/create"},{default:k(()=>[st]),_:1})):d("",!0)])]),x($,{countries:s.countries,filters:s.filters,roles:s.roles},null,8,["countries","filters","roles"]),x(Z,{countries:s.countries,roles:l.roles,users:s.users.data},null,8,["countries","roles","users"]),x(O,{links:s.users.links},null,8,["links"])]))}};export{pt as default};
