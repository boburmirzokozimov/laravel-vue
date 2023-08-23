import{T as x,o as l,c as d,a as f,w as y,u as e,b as s,d as h,e as n,h as g,F as u,i as k,t as a,f as i,v as c,Z as v,A as w}from"./app-12bc5e3c.js";import{U as V}from"./maska-6f10db43.js";/* empty css            */const C=s("title",null,"Create Branch",-1),U={class:"modal z-10"},S=s("h1",{class:"mb-6"},"Create The Branch",-1),B=["onSubmit"],A={class:"mb-6"},N=["value","textContent"],F={key:0,class:"text-red-500 text-sm"},L={class:"mb-6"},M=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"lat"}," Latitude ",-1),T={key:0,class:"text-red-500 text-sm"},j={class:"mb-6"},D=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"lon"}," Longitude ",-1),E={key:0,class:"text-red-500 text-sm"},q={class:"mb-6"},z=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"address"}," Address ",-1),H={key:0,class:"text-red-500 text-sm"},O={class:"mb-6"},W=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"full_address"}," Full Address ",-1),Z={key:0,class:"text-red-500 text-sm"},G={class:"mb-6"},I=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"contact_number"}," Contact Number ",-1),J={key:0,class:"text-red-500 text-sm"},K={class:"mb-6"},P=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"contact_email"}," Contact Email ",-1),Q={key:0,class:"text-red-500 text-sm"},R={class:"mb-6"},X=s("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"working_hours"}," Working Hours ",-1),Y={key:0,class:"text-red-500 text-sm"},$={class:"flex justify-end w-full"},ee=["disabled"],le={__name:"Create",props:{countries:Object},setup(m){const _=m,b=w({});let t=x({lat:"",lon:"",address:"",full_address:"",working_hours:"",contact_number:"",contact_email:"",country_id:0});const p=()=>{t.post("/branches",{onSuccess:()=>b.success("Successfully created")})};return(te,r)=>(l(),d(u,null,[f(e(v),null,{default:y(()=>[C]),_:1}),s("div",U,[S,s("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:h(p,["prevent"])},[s("div",A,[n(s("select",{id:"category","onUpdate:modelValue":r[0]||(r[0]=o=>e(t).country_id=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"category",required:""},[(l(!0),d(u,null,k(_.countries,o=>(l(),d("option",{value:o.id,textContent:a(o.name)},null,8,N))),256))],512),[[g,e(t).country_id]]),e(t).errors.country_id?(l(),d("div",F,a(e(t).errors.country_id),1)):i("",!0)]),s("div",L,[M,n(s("input",{id:"lat","onUpdate:modelValue":r[1]||(r[1]=o=>e(t).lat=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"lat",type:"text"},null,512),[[c,e(t).lat]]),e(t).errors.lat?(l(),d("div",T,a(e(t).errors.lat),1)):i("",!0)]),s("div",j,[D,n(s("input",{id:"lon","onUpdate:modelValue":r[2]||(r[2]=o=>e(t).lon=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"lon",type:"text"},null,512),[[c,e(t).lon]]),e(t).errors.lon?(l(),d("div",E,a(e(t).errors.lon),1)):i("",!0)]),s("div",q,[z,n(s("input",{id:"address","onUpdate:modelValue":r[3]||(r[3]=o=>e(t).address=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"address",type:"text"},null,512),[[c,e(t).address]]),e(t).errors.address?(l(),d("div",H,a(e(t).errors.address),1)):i("",!0)]),s("div",O,[W,n(s("input",{id:"full_address","onUpdate:modelValue":r[4]||(r[4]=o=>e(t).full_address=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"full_address",type:"text"},null,512),[[c,e(t).full_address]]),e(t).errors.full_address?(l(),d("div",Z,a(e(t).errors.full_address),1)):i("",!0)]),s("div",G,[I,n(s("input",{id:"contact_number","onUpdate:modelValue":r[5]||(r[5]=o=>e(t).contact_number=o),class:"border border-gray-200 p-2 w-full rounded-2xl px-2",name:"contact_number"},null,512),[[c,e(t).contact_number]]),e(t).errors.contact_number?(l(),d("div",J,a(e(t).errors.contact_number),1)):i("",!0)]),s("div",K,[P,n(s("input",{id:"contact_email","onUpdate:modelValue":r[6]||(r[6]=o=>e(t).contact_email=o),class:"border border-gray-200 p-2 w-full rounded-2xl px-2",name:"contact_email",type:"email"},null,512),[[c,e(t).contact_email]]),e(t).errors.contact_email?(l(),d("div",Q,a(e(t).errors.contact_email),1)):i("",!0)]),s("div",R,[X,n(s("input",{id:"working_hours","onUpdate:modelValue":r[7]||(r[7]=o=>e(t).working_hours=o),class:"border border-gray-200 p-2 w-full rounded-2xl px-2","data-maska":"##.##-##.##",name:"working_hours",type:"text"},null,512),[[c,e(t).working_hours],[e(V)]]),e(t).errors.working_hours?(l(),d("div",Y,a(e(t).errors.working_hours),1)):i("",!0)]),s("div",$,[s("button",{disabled:e(t).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"},"Submit ",8,ee)])],40,B)])],64))}};export{le as default};
