import{_ as h,T as y,o as a,c as l,a as g,w as v,u as s,b as e,d as q,e as p,g as u,t as i,h as c,l as m,F as w,Z as k,p as C,m as S,A as V}from"./app-d0c0e638.js";/* empty css            */const _=n=>(C("data-v-8c5652af"),n=n(),S(),n),E=_(()=>e("title",null,"Edit Card Request",-1)),I={class:"modal z-10 text-left"},j=_(()=>e("h1",{class:"mb-6"},"Edit Card Request",-1)),R=["onSubmit"],U={class:"mb-6"},N=_(()=>e("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"surname_edit"}," Фамилия ",-1)),T={key:0,class:"text-red-500 text-sm"},A={class:"mb-6"},B=_(()=>e("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"name"}," Имя ",-1)),D={key:0,class:"text-red-500 text-sm"},F={class:"mb-6"},M=_(()=>e("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"middle_name"}," Отчество ",-1)),O={key:0,class:"text-red-500 text-sm"},$={class:"mb-6"},z=_(()=>e("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"birth_date"}," Дата рождения ",-1)),H={key:0,class:"text-red-500 text-sm"},P={class:"mb-6"},Z=_(()=>e("label",{class:"block mb-2 uppercase font-bold text-sm text-gray-700",for:"phone"}," Телефон ",-1)),G={key:0,class:"text-red-500 text-sm"},J={class:"mb-6"},K={class:"items-center mb-2 uppercase font-bold text-sm text-gray-700 flex",for:"scan_passport"},L=["src"],Q={key:0,class:"text-red-500 text-sm"},W={class:"mb-6"},X={class:"items-center mb-2 uppercase font-bold text-sm text-gray-700 flex",for:"selfie_passport"},Y=["src"],ee={key:0,class:"text-red-500 text-sm"},te={class:"flex justify-end w-full"},se=["disabled"],re={__name:"EditCreditCardRequest",props:{client:Object,credit_card_request:Object},emits:["close"],setup(n,{emit:b}){const o=n,f=V({});let t=y({_method:"PATCH",id:o.credit_card_request.id,name:o.credit_card_request.name,surname:o.credit_card_request.surname,middle_name:o.credit_card_request.middle_name,phone:o.credit_card_request.phone,birth_date:o.credit_card_request.birth_date,client_id:o.credit_card_request.client_id,scan_passport:o.credit_card_request.scan_passport,selfie_passport:o.credit_card_request.selfie_passport});const x=()=>{t.post("/clients/"+o.credit_card_request.client_id+"/manage-credit-card/"+o.credit_card_request.id,{onSuccess:()=>{f.success("Successfully edited")}}),b("close")};return(de,r)=>(a(),l(w,null,[g(s(k),null,{default:v(()=>[E]),_:1}),e("div",I,[j,e("form",{class:"max-w-2xl mx-auto",method:"post",onSubmit:q(x,["prevent"])},[e("div",U,[N,p(e("input",{id:"surname_edit","onUpdate:modelValue":r[0]||(r[0]=d=>s(t).surname=d),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"surname_edit",type:"text"},null,512),[[u,s(t).surname]]),s(t).errors.surname?(a(),l("div",T,i(s(t).errors.surname),1)):c("",!0)]),e("div",A,[B,p(e("input",{id:"name","onUpdate:modelValue":r[1]||(r[1]=d=>s(t).name=d),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"surname",type:"text"},null,512),[[u,s(t).name]]),s(t).errors.name?(a(),l("div",D,i(s(t).errors.name),1)):c("",!0)]),e("div",F,[M,p(e("input",{id:"middle_name","onUpdate:modelValue":r[2]||(r[2]=d=>s(t).middle_name=d),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"middle_name",type:"text"},null,512),[[u,s(t).middle_name]]),s(t).errors.middle_name?(a(),l("div",O,i(s(t).errors.middle_name),1)):c("",!0)]),e("div",$,[z,p(e("input",{id:"birth_date","onUpdate:modelValue":r[3]||(r[3]=d=>s(t).birth_date=d),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"birth_date",type:"date"},null,512),[[u,s(t).birth_date]]),s(t).errors.birth_date?(a(),l("div",H,i(s(t).errors.birth_date),1)):c("",!0)]),e("div",P,[Z,p(e("input",{id:"phone","onUpdate:modelValue":r[4]||(r[4]=d=>s(t).phone=d),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"phone",type:"text"},null,512),[[u,s(t).phone]]),s(t).errors.phone?(a(),l("div",G,i(s(t).errors.phone),1)):c("",!0)]),e("div",J,[e("label",K,[m(" Селфи с паспортом "),e("img",{src:`/storage/${n.credit_card_request.scan_passport}`,alt:"",class:"ml-2 rounded-full w-10 h-10 bg-cover object-center"},null,8,L)]),e("input",{id:"scan_passport",class:"border border-gray-200 p-2 w-full rounded-2xl",name:"scan_passport",type:"file",onInput:r[5]||(r[5]=d=>s(t).scan_passport=d.target.files[0])},null,32),s(t).errors.scan_passport?(a(),l("div",Q,i(s(t).errors.scan_passport),1)):c("",!0)]),e("div",W,[e("label",X,[m(" Скан паспорта "),e("img",{src:`/storage/${n.credit_card_request.selfie_passport}`,alt:"",class:"ml-2 rounded-full w-10 h-10 bg-cover object-center"},null,8,Y)]),e("input",{id:"selfie_passport",class:"border border-gray-200 p-2 w-full rounded-2xl",name:"selfie_passport",type:"file",onInput:r[6]||(r[6]=d=>s(t).selfie_passport=d.target.files[0])},null,32),s(t).errors.selfie_passport?(a(),l("div",ee,i(s(t).errors.selfie_passport),1)):c("",!0)]),e("div",te,[e("button",{disabled:s(t).processing,class:"bg-blue-500 p-2 rounded-2xl text-white",type:"submit"}," Редактировать ",8,se)])],40,R)])],64))}},le=h(re,[["__scopeId","data-v-8c5652af"]]);export{le as default};