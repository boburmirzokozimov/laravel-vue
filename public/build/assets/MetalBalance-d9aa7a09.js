import{o as l,c as i,b as t,t as s}from"./app-93756fd7.js";/* empty css            */const x={class:"flex flex-col"},r={class:"sm:mx-0.5 lg:mx-0.5"},d={class:"py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full"},_={class:"overflow-hidden"},m={class:"min-w-full"},p={class:""},h={class:"border-b border-t"},b=t("th",{class:"w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," # ",-1),y=["textContent"],g={class:"border-b"},f=t("th",{class:"w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Card Type ",-1),u=["textContent"],w={class:"border-b"},C=t("th",{class:"w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Balance ",-1),v=["textContent"],B={class:"border-b"},k=t("th",{class:"w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left",scope:"col"}," Owner ",-1),O=["textContent"],L={__name:"MetalBalance",props:{balance:Object,client:Object},setup(e){return(S,j)=>{var o,n,a,c;return l(),i("div",x,[t("div",r,[t("div",d,[t("div",_,[t("table",m,[t("tbody",p,[t("tr",h,[b,t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right",textContent:s(e.balance.id)},null,8,y)]),t("tr",g,[f,t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right",textContent:s(e.balance.card_type)},null,8,u)]),t("tr",w,[C,t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right",textContent:s(((n=(o=e.balance)==null?void 0:o.balance)==null?void 0:n.toLocaleString("en-US"))??0)},null,8,v)]),t("tr",B,[k,t("td",{class:"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right",textContent:s((c=(a=e.balance)==null?void 0:a.client)==null?void 0:c.full_name)},null,8,O)])])])])])])])}}};export{L as default};