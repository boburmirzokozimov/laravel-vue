import{_ as f,T as y,m as k,o as r,c as n,a as v,w as g,u as t,b as s,d as w,e as m,v as u,t as i,f as _,F as S,Z as C,p as V,k as A,A as M}from"./app-35180fd1.js";import{U}from"./maska-6f10db43.js";/* empty css            */const l=d=>(V("data-v-b3ec9d9b"),d=d(),A(),d),I=l(()=>s("title",null,"Create Client",-1)),N={class:""},B=l(()=>s("h1",{class:"mb-6"},"Create The Client",-1)),F=["onSubmit"],T={class:"mb-6"},D=l(()=>s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"name"}," Full Name ",-1)),j={key:0,class:"text-red-500 text-sm"},E={class:"mb-6"},K=l(()=>s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"email"}," Phone ",-1)),P={key:0,class:"text-red-500 text-sm"},Z={class:"mb-6"},q=l(()=>s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"auth_key"}," Auth Key ",-1)),z={key:0,class:"text-red-500 text-sm"},G={class:"mb-6"},H=l(()=>s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"comments"}," Comments ",-1)),J={key:0,class:"text-red-500 text-sm"},L={class:"flex justify-end w-full"},O=["disabled"],Q={__name:"Create",setup(d){const h=M({});let e=y({full_name:"",phone:"",comments:"",auth_key:""});k(()=>{function c(o,a){let p="";for(let b=o;b>0;--b)p+=a[Math.floor(Math.random()*a.length)];return p}e.auth_key=c(12,"0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ")});const x=()=>{e.transform(c=>({...c,phone:e.phone.replaceAll(" ","").replaceAll("-","").replace("+","").replace("(","").replace(")","")})).post("/clients",{onSuccess:()=>h.success("Successfully created")})};return(c,o)=>(r(),n(S,null,[v(t(C),null,{default:g(()=>[I]),_:1}),s("div",N,[B,s("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:w(x,["prevent"])},[s("div",T,[D,m(s("input",{id:"name","onUpdate:modelValue":o[0]||(o[0]=a=>t(e).full_name=a),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"name",type:"text"},null,512),[[u,t(e).full_name]]),t(e).errors.full_name?(r(),n("div",j,i(t(e).errors.full_name),1)):_("",!0)]),s("div",E,[K,m(s("input",{id:"phone","onUpdate:modelValue":o[1]||(o[1]=a=>t(e).phone=a),class:"border border-gray-200 p-2 w-full rounded-2xl","data-maska":"+998 (##) ###-##-##",name:"phone",type:"text"},null,512),[[u,t(e).phone],[t(U)]]),t(e).errors.phone?(r(),n("div",P,i(t(e).errors.phone),1)):_("",!0)]),s("div",Z,[q,m(s("input",{id:"auth_key","onUpdate:modelValue":o[2]||(o[2]=a=>t(e).auth_key=a),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"auth_key",type:"text"},null,512),[[u,t(e).auth_key]]),t(e).errors.auth_key?(r(),n("div",z,i(t(e).errors.auth_key),1)):_("",!0)]),s("div",G,[H,m(s("textarea",{id:"comments","onUpdate:modelValue":o[3]||(o[3]=a=>t(e).comments=a),class:"border border-gray-200 p-2 w-full rounded-2xl px-2",name:"comments",rows:"10"},null,512),[[u,t(e).comments]]),t(e).errors.comments?(r(),n("div",J,i(t(e).errors.comments),1)):_("",!0)]),s("div",L,[s("button",{disabled:t(e).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"},"Submit ",8,O)])],40,F)])],64))}},Y=f(Q,[["__scopeId","data-v-b3ec9d9b"]]);export{Y as default};