import{T as _,o as l,c as n,a as f,w as p,u as t,b as s,d as b,e as d,v as i,t as m,f as r,F as x,Z as y,A as g}from"./app-13a5847b.js";/* empty css            */const h=s("title",null,"Create Country",-1),v={class:"modal z-10"},k=s("h1",{class:"mb-6"},"Create Country",-1),w=["onSubmit"],C={class:"mb-6"},S=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"name"}," Имя(Русском) ",-1),V={key:0,class:"text-red-500 text-sm"},B={class:"mb-6"},N=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"name_common"}," Имя(Английском) ",-1),U={key:0,class:"text-red-500 text-sm"},A={class:"mb-6"},D=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"name_official"}," Имя(Израильском) ",-1),F={key:0,class:"text-red-500 text-sm"},M={key:0,class:"mb-6"},T=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"scan_passport"}," Флаг ",-1),j={key:0,class:"text-red-500 text-sm"},z={class:"flex justify-end w-full"},E=["disabled"],H={__name:"Create",setup(I){const c=g({});let e=_({name:"",name_common:"",name_official:"",flag:null});const u=()=>{e.post("/countries",{onSuccess:()=>c.success("Successfully created")})};return(Z,o)=>(l(),n(x,null,[f(t(y),null,{default:p(()=>[h]),_:1}),s("div",v,[k,s("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:b(u,["prevent"])},[s("div",C,[S,d(s("input",{id:"name","onUpdate:modelValue":o[0]||(o[0]=a=>t(e).name=a),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"name",type:"text"},null,512),[[i,t(e).name]]),t(e).errors.name?(l(),n("div",V,m(t(e).errors.name),1)):r("",!0)]),s("div",B,[N,d(s("input",{id:"name_common","onUpdate:modelValue":o[1]||(o[1]=a=>t(e).name_common=a),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"name_common",type:"text"},null,512),[[i,t(e).name_common]]),t(e).errors.name_common?(l(),n("div",U,m(t(e).errors.name_common),1)):r("",!0)]),s("div",A,[D,d(s("input",{id:"name_official","onUpdate:modelValue":o[2]||(o[2]=a=>t(e).name_official=a),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"name_official",type:"text"},null,512),[[i,t(e).name_official]]),t(e).errors.name_official?(l(),n("div",F,m(t(e).errors.name_official),1)):r("",!0)]),t(e).anonymous?r("",!0):(l(),n("div",M,[T,s("input",{id:"flag",class:"border border-gray-200 p-2 w-full rounded-2xl",name:"flag",type:"file",onInput:o[3]||(o[3]=a=>t(e).flag=a.target.files[0])},null,32),t(e).errors.flag?(l(),n("div",j,m(t(e).errors.flag),1)):r("",!0)])),s("div",z,[s("button",{disabled:t(e).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"},"Submit ",8,E)])],40,w)])],64))}};export{H as default};
