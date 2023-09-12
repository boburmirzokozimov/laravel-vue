import{_ as g,T as k,x as U,o as r,c as d,a as w,w as S,u as o,b as t,d as N,e as c,v as f,t as u,f as i,h as p,F as b,i as C,Z as V,p as A,m as B,z as M,A as E}from"./app-d360592b.js";import{t as I}from"./telMask-f359b5df.js";import{U as R}from"./maska-6f10db43.js";/* empty css            */const a=n=>(A("data-v-2f07607f"),n=n(),B(),n),T=a(()=>t("title",null,"Edit Courier",-1)),Z={class:"w-[500px] modal z-10"},j=a(()=>t("h1",{class:"mb-6"},"Create The Courier",-1)),q=["onSubmit"],z={class:"mb-6"},D=a(()=>t("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"fullName"}," ФИО ",-1)),F={key:0,class:"text-red-500 text-sm"},G={class:"mb-6"},K=a(()=>t("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"phone"}," Phone ",-1)),L={class:"flex"},O=M('<option value="RU" data-v-2f07607f>RU</option><option value="US" data-v-2f07607f>US</option><option value="UAE" data-v-2f07607f>US</option><option value="KG" data-v-2f07607f>KG</option><option value="UZB" data-v-2f07607f>UZB</option>',5),P=[O],H=["data-maska","placeholder"],J={key:0,class:"text-red-500 text-sm"},Q={class:"mb-6"},W=a(()=>t("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"country"}," Страна ",-1)),X=["selected","value","textContent"],Y={key:0,class:"text-red-500 text-sm"},$={class:"mb-6"},ee=a(()=>t("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"status"}," Статус ",-1)),te=a(()=>t("option",{selected:"",value:"active"}," Активный ",-1)),oe=a(()=>t("option",{value:"inactive"}," Неактивный ",-1)),se=a(()=>t("option",{value:"blocked"}," Блокированный ",-1)),le=[te,oe,se],ae={key:0,class:"text-red-500 text-sm"},re={class:"flex justify-end w-full"},de=["disabled"],ne={__name:"Create",props:{countries:Object},emits:["close"],setup(n,{emit:h}){const x=n,v=E({});let e=k({fullName:"",phone:"",country:"",status:"",tel_type:"RU"});const _=U(()=>I[e.tel_type]),y=()=>{e.transform(m=>({...m,phone:e.phone.replaceAll(" ","").replaceAll("-","").replace("+","").replace("(","").replace(")","")})).post("/couriers",{onSuccess:()=>{h("close"),v.success("Successfully created")}})};return(m,l)=>(r(),d(b,null,[w(o(V),null,{default:S(()=>[T]),_:1}),t("div",Z,[j,t("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:N(y,["prevent"])},[t("div",z,[D,c(t("input",{id:"fullName","onUpdate:modelValue":l[0]||(l[0]=s=>o(e).fullName=s),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"fullName",type:"text"},null,512),[[f,o(e).fullName]]),o(e).errors.fullName?(r(),d("div",F,u(o(e).errors.fullName),1)):i("",!0)]),t("div",G,[K,t("div",L,[c(t("select",{id:"","onUpdate:modelValue":l[1]||(l[1]=s=>o(e).tel_type=s),class:"border border-gray-200 p-2 w-2/12 rounded-bl-2xl rounded-tl-2xl",name:""},P,512),[[p,o(e).tel_type]]),c(t("input",{id:"phone","onUpdate:modelValue":l[2]||(l[2]=s=>o(e).phone=s),"data-maska":_.value,placeholder:_.value,class:"border border-gray-200 p-2 w-full rounded-br-2xl rounded-tr-2xl",name:"phone",type:"text"},null,8,H),[[f,o(e).phone],[o(R)]])]),o(e).errors.phone?(r(),d("div",J,u(o(e).errors.phone),1)):i("",!0)]),t("div",Q,[W,c(t("select",{id:"country","onUpdate:modelValue":l[3]||(l[3]=s=>o(e).country=s),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"country",required:""},[(r(!0),d(b,null,C(x.countries,s=>(r(),d("option",{selected:o(e).country===s.name,value:s.name,textContent:u(s.name)},null,8,X))),256))],512),[[p,o(e).country]]),o(e).errors.country?(r(),d("div",Y,u(o(e).errors.country),1)):i("",!0)]),t("div",$,[ee,c(t("select",{id:"status","onUpdate:modelValue":l[4]||(l[4]=s=>o(e).status=s),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"status",required:""},le,512),[[p,o(e).status]]),o(e).errors.country?(r(),d("div",ae,u(o(e).errors.country),1)):i("",!0)]),t("div",re,[t("button",{disabled:o(e).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"},"Submit ",8,de)])],40,q)])],64))}},_e=g(ne,[["__scopeId","data-v-2f07607f"]]);export{_e as default};
