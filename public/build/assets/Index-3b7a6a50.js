import x from"./MetalBalance-6f4cee06.js";import h from"./Table-6b8717e3.js";import{P as b}from"./Paginator-16d6e4bb.js";import{r as m,o as a,c as s,b as e,a as n,w as o,l as u,N as d,F as l,f,q as p,t as k,k as g,h as y}from"./app-d3cd7f26.js";import"./Modal-29f337cc.js";import"./Edit-5b6942a4.js";/* empty css            */const v={class:"mb-6"},C={class:"flex justify-between"},w={class:"flex"},B=e("h1",{class:"text-gray-400"}," Metal Balance ",-1),N={class:"flex items-center"},T=e("i",{class:"fa fa-backward text-white"},null,-1),$={class:"flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"},j=["onClick","textContent"],z={__name:"Index",props:{metals:Object,client:Object,metalTransactions:Object},setup(r){const c=r,i=m("XAU"),_=m([{name:"XAU"},{name:"XAG"},{name:"XPT"}]);return(V,X)=>(a(),s(l,null,[e("div",v,[e("div",C,[e("div",w,[n(d,{href:`/clients/${c.client.id}`,as:"h1",class:"cursor-pointer text-center"},{default:o(()=>[u(" Main Balance/ ")]),_:1},8,["href"]),B,n(d,{href:`/crypto/${c.client.id}`,as:"h1",class:"cursor-pointer text-center"},{default:o(()=>[u(" /Crypto Balance ")]),_:1},8,["href"])]),e("div",N,[n(d,{class:"btn-success",href:"/clients"},{default:o(()=>[T]),_:1})])])]),e("ul",$,[(a(!0),s(l,null,f(_.value,t=>(a(),s("li",{class:p([i.value===t.name&&"bg-white","cursor-pointer inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500"]),"aria-current":"page",onClick:A=>i.value=t.name,textContent:k(t.name)},null,10,j))),256))]),(a(!0),s(l,null,f(r.metals,t=>(a(),s(l,null,[t.card_type===i.value?(a(),g(x,{key:0,balance:t,client:c.client},null,8,["balance","client"])):y("",!0)],64))),256)),n(h,{"metal-transactions":r.metalTransactions.data},null,8,["metal-transactions"]),n(b,{links:r.metalTransactions.links},null,8,["links"])],64))}};export{z as default};
