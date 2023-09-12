import{_ as g,T as S,x as k,o as a,c as r,a as b,w as h,u as t,b as o,N as C,d as V,e as u,v,t as n,f as c,h as p,F as _,i as y,Z as N,p as j,m as A,z as B,A as M}from"./app-d360592b.js";import{U as I}from"./maska-6f10db43.js";import{t as F}from"./telMask-f359b5df.js";/* empty css            */const i=d=>(j("data-v-f5900757"),d=d(),A(),d),O=i(()=>o("title",null,"Create User",-1)),R={class:""},T={class:"flex max-w-2xl mx-auto items-center justify-between"},Z=i(()=>o("h1",{class:"mb-6"},"Create The User",-1)),q=i(()=>o("i",{class:"fa fa-backward text-white"},null,-1)),D=["onSubmit"],E={class:"mb-6"},G=i(()=>o("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"name"}," Full Name ",-1)),K={key:0,class:"text-red-500 text-sm"},L={class:"mb-6"},z=i(()=>o("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"phone"}," Phone ",-1)),P={class:"flex"},H=B('<option value="RU" data-v-f5900757>RU</option><option value="US" data-v-f5900757>US</option><option value="UAE" data-v-f5900757>US</option><option value="KG" data-v-f5900757>KG</option><option value="UZB" data-v-f5900757>UZB</option>',5),J=[H],Q=["data-maska","placeholder"],W={key:0,class:"text-red-500 text-sm"},X={class:"mb-6"},Y=["value","textContent"],$={key:0,class:"text-red-500 text-sm"},ee={class:"mb-6"},te=["value","textContent"],oe={key:0,class:"text-red-500 text-sm"},se={class:"flex justify-end w-full"},le=["disabled"],ae={__name:"Create",props:{user:Object,countries:Object,roles:Object},setup(d){const m=d,U=M({});let e=S({full_name:"",phone:"",country:"",role:"",tel_type:"RU"});const f=k(()=>F[e.tel_type]),w=()=>{e.transform(x=>({...x,phone:e.phone.replaceAll(" ","").replaceAll("-","").replace("+","").replace("(","").replace(")","")})).post("/users",{onSuccess:()=>U.success("Successfully created")})};return(x,l)=>(a(),r(_,null,[b(t(N),null,{default:h(()=>[O]),_:1}),o("div",R,[o("div",T,[Z,o("div",null,[b(C,{class:"btn-success",href:"/users"},{default:h(()=>[q]),_:1})])]),o("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:V(w,["prevent"])},[o("div",E,[G,u(o("input",{id:"name","onUpdate:modelValue":l[0]||(l[0]=s=>t(e).full_name=s),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"name",type:"text"},null,512),[[v,t(e).full_name]]),t(e).errors.full_name?(a(),r("div",K,n(t(e).errors.full_name),1)):c("",!0)]),o("div",L,[z,o("div",P,[u(o("select",{id:"","onUpdate:modelValue":l[1]||(l[1]=s=>t(e).tel_type=s),class:"border border-gray-200 p-2 w-2/12 rounded-bl-2xl rounded-tl-2xl",name:""},J,512),[[p,t(e).tel_type]]),u(o("input",{id:"phone","onUpdate:modelValue":l[2]||(l[2]=s=>t(e).phone=s),"data-maska":f.value,placeholder:f.value,class:"border border-gray-200 p-2 w-full rounded-br-2xl rounded-tr-2xl",name:"phone",type:"text"},null,8,Q),[[v,t(e).phone],[t(I)]])]),t(e).errors.phone?(a(),r("div",W,n(t(e).errors.phone),1)):c("",!0)]),o("div",X,[u(o("select",{id:"category","onUpdate:modelValue":l[3]||(l[3]=s=>t(e).country=s),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"category",required:""},[(a(!0),r(_,null,y(m.countries,s=>(a(),r("option",{value:s.name,textContent:n(s.name)},null,8,Y))),256))],512),[[p,t(e).country]]),t(e).errors.country?(a(),r("div",$,n(t(e).errors.country),1)):c("",!0)]),o("div",ee,[u(o("select",{id:"role","onUpdate:modelValue":l[4]||(l[4]=s=>t(e).role=s),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"role",required:""},[(a(!0),r(_,null,y(m.roles,s=>(a(),r("option",{value:s.id,textContent:n(s.name.toUpperCase())},null,8,te))),256))],512),[[p,t(e).role]]),t(e).errors.role?(a(),r("div",oe,n(t(e).errors.role),1)):c("",!0)]),o("div",se,[o("button",{disabled:t(e).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"},"Submit ",8,le)])],40,D)])],64))}},ie=g(ae,[["__scopeId","data-v-f5900757"]]);export{ie as default};
