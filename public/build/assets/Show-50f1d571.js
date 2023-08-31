import{r as o,o as a,c,a as s,w as l,b as t,t as _,u as k,N as b,F as f,i as h,e as d,g as u,k as v,f as m,Z as C,n as x}from"./app-baa30633.js";import j from"./ShowTable-23692d1c.js";import w from"./CreditCardTable-e179d317.js";import S from"./CreditCardRequestTable-0b3ddca3.js";import A from"./CreditCardRequestTableAnonymous-6deb2277.js";import O from"./BalanceRequestTable-b66bd7bc.js";import R from"./CreditCardDepositTable-6252fd52.js";import $ from"./CreditCardWithdrawTable-039e79ef.js";import I from"./CreditCardTransactionsHistoryTable-8609861f.js";/* empty css            */import"./Modal-142ffc19.js";import"./EditCreditCard-e0f3fc54.js";import"./maska-6f10db43.js";import"./ActivateCreditCard-f9fea7ec.js";import"./EditCreditCardRequest-f37aa45f.js";import"./EditAnonymousCreditCardRequest-1d8349b7.js";import"./InfoPopUp-05596534.js";const N={class:""},V={class:"mb-6"},B={class:"flex justify-between"},D={class:"mb-6 items-center"},T={class:"flex items-center"},H=t("i",{class:"fa fa-backward text-white"},null,-1),L={class:"flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"},Y=["onClick","textContent"],E={class:"flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"},F=["onClick","textContent"],z={class:"mb-6"},Z=t("div",{class:"flex justify-start"},[t("h1",{class:"mb-6"},"Выпущенные карты")],-1),G={class:"mb-6"},J={class:"flex justify-between"},K=t("h1",{class:"mb-6"},"Таблица заявок на выпуск карты VISA",-1),M={class:"flex items-center"},P={class:"mb-6"},Q=t("div",{class:"flex justify-start"},[t("h1",{class:"mb-6"},"Таблица заявок на выпуск карты VISA на псевдоним")],-1),U={key:0,class:"mb-6"},W=t("div",{class:"flex justify-start"},[t("h1",{class:"mb-6"},"Таблица заявок на Пополнения карт VISA")],-1),X={key:1,class:"mb-6"},tt=t("div",{class:"flex justify-start"},[t("h1",{class:"mb-6"},"Таблица заявок на Оплату по реквизитам")],-1),et={key:2,class:"mb-6"},st=t("div",{class:"flex justify-start"},[t("h1",{class:"mb-6"},"Таблица всех транзакций клиента ")],-1),at={key:3,class:"mb-6"},ct={class:"flex justify-between"},rt=t("h1",{class:"mb-6"}," Таблица заявок на пополнение и списание баланса",-1),nt={class:"flex items-center"},wt={__name:"Show",props:{client:Object,balance_request:Object,credit_card_requests:Object,credit_card_requests_anonymous:Object,credit_cards:Object,credit_card_transactions:Object,credit_card_transactions_requisite:Object,transaction_statuses:Object,balance_transaction_history:Object},setup(y){const e=y,g=o([{name:"CARDS"},{name:"BALANCE"},{name:"HISTORY"}]),p=o([{name:"Cards"},{name:"Requests"},{name:"Anonymous Requests"}]);o([{name:"Cards"},{name:"Requests"},{name:"Anonymous Requests"}]);const r=o("CARDS"),i=o("");return(it,ot)=>(a(),c(f,null,[s(k(C),null,{default:l(()=>[t("title",null,_(e.client.full_name),1)]),_:1}),t("div",N,[t("div",V,[t("div",B,[t("h1",D,_(e.client.full_name),1),t("div",T,[s(b,{class:"btn-success",href:"/clients"},{default:l(()=>[H]),_:1})])]),s(j,{client:e.client},null,8,["client"])]),t("div",null,[t("ul",L,[(a(!0),c(f,null,h(g.value,n=>(a(),c("li",{class:x([r.value===n.name&&"bg-white","cursor-pointer inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500"]),"aria-current":"page",onClick:q=>r.value=n.name,textContent:_(n.name)},null,10,Y))),256))])]),d(t("div",null,[t("ul",E,[(a(!0),c(f,null,h(p.value,n=>(a(),c("li",{class:x([i.value===n.name&&"bg-white","cursor-pointer inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500"]),"aria-current":"page",onClick:q=>i.value=n.name,textContent:_(n.name)},null,10,F))),256))])],512),[[u,r.value==="CARDS"]]),t("div",null,[d(t("div",z,[Z,s(w,{credit_cards:e.credit_cards},null,8,["credit_cards"])],512),[[u,e.credit_cards.length&&i.value==="Cards"]]),d(t("div",G,[t("div",J,[K,t("div",M,[s(b,{href:`/clients/${e.client.id}/manage-credit-card`,class:"btn-success"},{default:l(()=>[v("Создать VISA карту ")]),_:1},8,["href"])])]),s(S,{credit_card_requests:e.credit_card_requests},null,8,["credit_card_requests"])],512),[[u,e.credit_card_requests.length&&i.value==="Requests"]]),d(t("div",P,[Q,s(A,{credit_card_requests_anonymous:e.credit_card_requests_anonymous},null,8,["credit_card_requests_anonymous"])],512),[[u,e.credit_card_requests_anonymous.length&&i.value==="Anonymous Requests"]]),e.credit_card_transactions.length&&r.value==="HISTORY"?(a(),c("div",U,[W,s(R,{credit_card_transactions:e.credit_card_transactions,transaction_statuses:e.transaction_statuses},null,8,["credit_card_transactions","transaction_statuses"])])):m("",!0),e.credit_card_transactions.length&&r.value==="HISTORY"?(a(),c("div",X,[tt,s($,{credit_card_transactions_requisite:e.credit_card_transactions_requisite},null,8,["credit_card_transactions_requisite"])])):m("",!0),e.balance_transaction_history.length&&r.value==="HISTORY"?(a(),c("div",et,[st,s(I,{credit_card_transactions:e.balance_transaction_history},null,8,["credit_card_transactions"])])):m("",!0),e.balance_request&&r.value==="BALANCE"?(a(),c("div",at,[t("div",ct,[rt,t("div",nt,[s(b,{href:`/clients/${e.client.id}/manage-balance`,class:"btn-success"},{default:l(()=>[v("Создать заявку ")]),_:1},8,["href"])])]),s(O,{balance_requests:e.balance_request,transaction_statuses:e.transaction_statuses},null,8,["balance_requests","transaction_statuses"])])):m("",!0)])])],64))}};export{wt as default};
