import{_ as v,T as g,o as r,c as l,a as w,w as C,u as t,b as s,d as S,e as u,v as b,t as n,f as c,h as x,F as p,g as h,Z as k,p as U,j as V,A as j}from"./app-df1a6cc3.js";import{U as A}from"./maska-6f10db43.js";/* empty css            */const i=d=>(U("data-v-3d6ab1d5"),d=d(),V(),d),I=i(()=>s("title",null,"Create User",-1)),N={class:""},B=i(()=>s("h1",{class:"mb-6"},"Create The User",-1)),F=["onSubmit"],M={class:"mb-6"},O=i(()=>s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"name"}," Full Name ",-1)),T={key:0,class:"text-red-500 text-sm"},q={class:"mb-6"},D=i(()=>s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"email"}," Phone ",-1)),E={key:0,class:"text-red-500 text-sm"},L={class:"mb-6"},P=["value","textContent"],Z={key:0,class:"text-red-500 text-sm"},z={class:"mb-6"},G=["value","textContent"],H={key:0,class:"text-red-500 text-sm"},J={class:"flex justify-end w-full"},K=["disabled"],Q={__name:"Create",props:{user:Object,countries:Object,roles:Object},setup(d){const m=d,f=j({});let e=g({full_name:"",phone:"",country:"",role:""});const y=()=>{e.transform(_=>({..._,phone:e.phone.replaceAll(" ","").replaceAll("-","").replace("+","").replace("(","").replace(")","")})).post("/users",{onSuccess:()=>f.success("Successfully created")})};return(_,a)=>(r(),l(p,null,[w(t(k),null,{default:C(()=>[I]),_:1}),s("div",N,[B,s("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:S(y,["prevent"])},[s("div",M,[O,u(s("input",{id:"name","onUpdate:modelValue":a[0]||(a[0]=o=>t(e).full_name=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"name",type:"text"},null,512),[[b,t(e).full_name]]),t(e).errors.full_name?(r(),l("div",T,n(t(e).errors.full_name),1)):c("",!0)]),s("div",q,[D,u(s("input",{id:"email","onUpdate:modelValue":a[1]||(a[1]=o=>t(e).phone=o),class:"border border-gray-200 p-2 w-full rounded-2xl","data-maska":"+998 (##) ###-##-##",name:"email",type:"text"},null,512),[[b,t(e).phone],[t(A)]]),t(e).errors.phone?(r(),l("div",E,n(t(e).errors.phone),1)):c("",!0)]),s("div",L,[u(s("select",{id:"category","onUpdate:modelValue":a[2]||(a[2]=o=>t(e).country=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"category",required:""},[(r(!0),l(p,null,h(m.countries,o=>(r(),l("option",{value:o.name,textContent:n(o.name)},null,8,P))),256))],512),[[x,t(e).country]]),t(e).errors.country?(r(),l("div",Z,n(t(e).errors.country),1)):c("",!0)]),s("div",z,[u(s("select",{id:"role","onUpdate:modelValue":a[3]||(a[3]=o=>t(e).role=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"role",required:""},[(r(!0),l(p,null,h(m.roles,o=>(r(),l("option",{value:o.id,textContent:n(o.name.toUpperCase())},null,8,G))),256))],512),[[x,t(e).role]]),t(e).errors.role?(r(),l("div",H,n(t(e).errors.role),1)):c("",!0)]),s("div",J,[s("button",{disabled:t(e).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"},"Submit ",8,K)])],40,F)])],64))}},Y=v(Q,[["__scopeId","data-v-3d6ab1d5"]]);export{Y as default};
