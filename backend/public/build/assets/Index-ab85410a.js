import m from"./Table-8c8f7b1a.js";import{M as d}from"./Modal-35b84230.js";import p from"./Create-81b72822.js";import{r as f,o as t,c as a,b as s,f as r,a as _,k as n}from"./app-1e5e4c30.js";import"./Edit-9e6147be.js";const v={class:"flex justify-between items-center"},k=s("div",null,[s("h1",{class:"text-3xl text-center"}," Couriers ")],-1),j={__name:"Index",props:{couriers:Object,countries:Object},setup(l){const o=l,e=f(!1),c=()=>{e.value=!1},u=()=>{e.value=!0};return(i,C)=>(t(),a("div",null,[s("div",v,[k,s("div",null,[i.$page.props.is_manager?(t(),a("button",{key:0,class:"btn-success",onClick:u}," Создать Курьера ")):r("",!0)])]),_(m,{countries:o.countries,couriers:o.couriers.data},null,8,["countries","couriers"]),e.value?(t(),n(d,{key:0,onClose:c})):r("",!0),e.value?(t(),n(p,{key:1,countries:o.countries,onClose:c},null,8,["countries"])):r("",!0)]))}};export{j as default};
