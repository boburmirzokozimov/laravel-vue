import{T as _,o as r,c as a,a as b,w as p,u as s,b as e,d as x,e as n,v as u,t as c,f as d,F as f,Z as h,A as w}from"./app-1aa5328d.js";/* empty css            */const y=e("title",null,"Create Key",-1),v={class:"modal z-10"},g=e("h1",{class:"mb-6"},"Create The Key",-1),k=["onSubmit"],S={class:"mb-6"},C=e("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"account_number"}," Расчетный счет ",-1),V={key:0,class:"text-red-500 text-sm"},B={class:"mb-6"},N=e("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"wallet_number"}," Кошелёк ",-1),T={key:0,class:"text-red-500 text-sm"},A={class:"flex justify-end w-full"},D=["disabled"],j={__name:"Create",setup(F){const m=w({});let t=_({account_number:"",wallet_number:""});const i=()=>{t.post("/keys",{onSuccess:()=>m.success("Successfully created")})};return(K,o)=>(r(),a(f,null,[b(s(h),null,{default:p(()=>[y]),_:1}),e("div",v,[g,e("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:x(i,["prevent"])},[e("div",S,[C,n(e("input",{id:"account_number","onUpdate:modelValue":o[0]||(o[0]=l=>s(t).account_number=l),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"account_number",type:"text"},null,512),[[u,s(t).account_number]]),s(t).errors.account_number?(r(),a("div",V,c(s(t).errors.account_number),1)):d("",!0)]),e("div",B,[N,n(e("input",{id:"wallet_number","onUpdate:modelValue":o[1]||(o[1]=l=>s(t).wallet_number=l),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"wallet_number",type:"text"},null,512),[[u,s(t).wallet_number]]),s(t).errors.wallet_number?(r(),a("div",T,c(s(t).errors.wallet_number),1)):d("",!0)]),e("div",A,[e("button",{disabled:s(t).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"},"Submit ",8,D)])],40,k)])],64))}};export{j as default};
