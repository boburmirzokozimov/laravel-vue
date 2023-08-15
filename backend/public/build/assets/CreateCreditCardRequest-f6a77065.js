import{T as x,o as r,c as a,a as f,w as h,u as s,b as t,d as g,n as _,e as m,v as u,t as d,f as l,F as k,Z as v,A as w}from"./app-adcd881d.js";import{U as V}from"./maska-6f10db43.js";/* empty css            */const S=t("title",null,"Создать VISA Карту",-1),C={class:""},U=t("h1",{class:"mb-6"},"Создать VISA Карту",-1),A=["onSubmit"],I={class:"mb-6"},B={key:0,class:"mb-6"},N=t("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"surname"}," Фамилия ",-1),j={key:0,class:"text-red-500 text-sm"},D={key:1,class:"mb-6"},F=t("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"name"}," Имя ",-1),M={key:0,class:"text-red-500 text-sm"},T={key:2,class:"mb-6"},$=t("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"middle_name"}," Отчество ",-1),q={key:0,class:"text-red-500 text-sm"},z={key:3,class:"mb-6"},E=t("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"birth_date"}," Дата рождения ",-1),O={key:0,class:"text-red-500 text-sm"},R={key:4,class:"mb-6"},Z=t("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"phone"}," Телефон ",-1),G={key:0,class:"text-red-500 text-sm"},H={key:5,class:"mb-6"},J=t("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"scan_passport"}," Селфи с паспортом ",-1),K={key:0,class:"text-red-500 text-sm"},L={key:6,class:"mb-6"},P=t("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"selfie_passport"}," Скан паспорта ",-1),Q={key:0,class:"text-red-500 text-sm"},W={key:7},X={class:"mb-6"},Y=t("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"anonymous_surname"}," Предпочитаемое Фамилия ",-1),ee={key:0,class:"text-red-500 text-sm"},se={class:"mb-6"},te=t("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"anonymous_name"}," Предпочитаемое Имя ",-1),oe={key:0,class:"text-red-500 text-sm"},ne={class:"flex justify-end w-full"},re=["disabled"],me={__name:"CreateCreditCardRequest",props:{client:Object},setup(b){const i=b,p=w({}),e=x({name:"",surname:"",middle_name:"",phone:"",birth_date:"",client_id:i.client.id,scan_passport:null,selfie_passport:null,anonymous:!1,anonymous_surname:"",anonymous_name:""}),y=()=>{e.anonymous?e.post("/clients/"+i.client.id+"/manage-credit-card-anonymous",{onSuccess:()=>p.success("Successfully created")}):e.transform(c=>({...c,phone:e.phone.replaceAll(" ","").replaceAll("-","").replace("+","").replace("(","").replace(")","")})).post("/clients/"+i.client.id+"/manage-credit-card",{onSuccess:()=>p.success("Successfully created")})};return(c,o)=>(r(),a(k,null,[f(s(v),null,{default:h(()=>[S]),_:1}),t("div",C,[U,t("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:g(y,["prevent"])},[t("div",I,[t("button",{class:_([s(e).anonymous?"text-gray-700":"bg-green-600 text-white","w-1/2 p-4 rounded-md"]),type:"button",onClick:o[0]||(o[0]=n=>s(e).anonymous=!1)}," Катра на своё имя ",2),t("button",{class:_([s(e).anonymous?"bg-green-600 text-white":"text-gray-700","w-1/2 p-4 rounded-md"]),type:"button",onClick:o[1]||(o[1]=n=>s(e).anonymous=!0)}," Карта на псевдоним ",2)]),s(e).anonymous?l("",!0):(r(),a("div",B,[N,m(t("input",{id:"surname","onUpdate:modelValue":o[2]||(o[2]=n=>s(e).surname=n),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"surname",type:"text"},null,512),[[u,s(e).surname]]),s(e).errors.surname?(r(),a("div",j,d(s(e).errors.surname),1)):l("",!0)])),s(e).anonymous?l("",!0):(r(),a("div",D,[F,m(t("input",{id:"name","onUpdate:modelValue":o[3]||(o[3]=n=>s(e).name=n),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"surname",type:"text"},null,512),[[u,s(e).name]]),s(e).errors.name?(r(),a("div",M,d(s(e).errors.name),1)):l("",!0)])),s(e).anonymous?l("",!0):(r(),a("div",T,[$,m(t("input",{id:"middle_name","onUpdate:modelValue":o[4]||(o[4]=n=>s(e).middle_name=n),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"middle_name",type:"text"},null,512),[[u,s(e).middle_name]]),s(e).errors.middle_name?(r(),a("div",q,d(s(e).errors.middle_name),1)):l("",!0)])),s(e).anonymous?l("",!0):(r(),a("div",z,[E,m(t("input",{id:"birth_date","onUpdate:modelValue":o[5]||(o[5]=n=>s(e).birth_date=n),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"birth_date",type:"date"},null,512),[[u,s(e).birth_date]]),s(e).errors.birth_date?(r(),a("div",O,d(s(e).errors.birth_date),1)):l("",!0)])),s(e).anonymous?l("",!0):(r(),a("div",R,[Z,m(t("input",{id:"phone","onUpdate:modelValue":o[6]||(o[6]=n=>s(e).phone=n),class:"border border-gray-200 p-2 w-full rounded-2xl","data-maska":"+998 (##) ###-##-##",name:"phone",type:"text"},null,512),[[u,s(e).phone],[s(V)]]),s(e).errors.phone?(r(),a("div",G,d(s(e).errors.phone),1)):l("",!0)])),s(e).anonymous?l("",!0):(r(),a("div",H,[J,t("input",{id:"scan_passport",class:"border border-gray-200 p-2 w-full rounded-2xl",name:"scan_passport",type:"file",onInput:o[7]||(o[7]=n=>s(e).scan_passport=n.target.files[0])},null,32),s(e).errors.scan_passport?(r(),a("div",K,d(s(e).errors.scan_passport),1)):l("",!0)])),s(e).anonymous?(r(),a("div",W,[t("div",X,[Y,m(t("input",{id:"anonymous_surname","onUpdate:modelValue":o[9]||(o[9]=n=>s(e).anonymous_surname=n),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"anonymous_surname",type:"text"},null,512),[[u,s(e).anonymous_surname]]),s(e).errors.anonymous_surname?(r(),a("div",ee,d(s(e).errors.anonymous_surname),1)):l("",!0)]),t("div",se,[te,m(t("input",{id:"anonymous_name","onUpdate:modelValue":o[10]||(o[10]=n=>s(e).anonymous_name=n),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"anonymous_name",type:"text"},null,512),[[u,s(e).anonymous_name]]),s(e).errors.anonymous_name?(r(),a("div",oe,d(s(e).errors.anonymous_name),1)):l("",!0)])])):(r(),a("div",L,[P,t("input",{id:"selfie_passport",class:"border border-gray-200 p-2 w-full rounded-2xl",name:"selfie_passport",type:"file",onInput:o[8]||(o[8]=n=>s(e).selfie_passport=n.target.files[0])},null,32),s(e).errors.selfie_passport?(r(),a("div",Q,d(s(e).errors.selfie_passport),1)):l("",!0)])),t("div",ne,[t("button",{disabled:s(e).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"},"Создать ",8,re)])],40,A)])],64))}};export{me as default};