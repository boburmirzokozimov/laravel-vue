import{T as d,m as u,O as m,o as i,c as f,b as a,e as n,v as p,u as r}from"./app-d5cbf76a.js";import{l as h}from"./lodash-3a1f5a60.js";import{U as _}from"./maska-6f10db43.js";/* empty css            */const b={class:"flex justify-center mb-6"},v={class:"w-1/3 mr-2"},x={class:"w-1/3 mr-2"},B={__name:"Filter",props:{filters:Object},setup(c){const t=c,e=d({full_name:t.filters.full_name,phone:t.filters.phone});return u(e,h.debounce(function(l){m.get("/clients",{full_name:l.full_name,phone:l.phone},{preserveState:!0,replace:!0})},500)),(l,s)=>(i(),f("div",b,[a("div",v,[n(a("input",{id:"search","onUpdate:modelValue":s[0]||(s[0]=o=>r(e).full_name=o),class:"border border-gray-200 p-2 w-full rounded-2xl",name:"search",placeholder:"Name...",type:"search"},null,512),[[p,r(e).full_name]])]),a("div",x,[n(a("input",{id:"search","onUpdate:modelValue":s[1]||(s[1]=o=>r(e).phone=o),class:"border border-gray-200 p-2 w-full rounded-2xl","data-maska":"#############",name:"search",placeholder:"Phone...",type:"search"},null,512),[[p,r(e).phone],[r(_)]])])]))}};export{B as default};
