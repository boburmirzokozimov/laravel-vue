import m from"./Table-5f7ebee1.js";import{M as p}from"./Modal-e010db68.js";import d from"./Create-fbcbdd87.js";import{r as _,o as s,c as a,b as e,f as r,a as f,k as n}from"./app-a3f0f65f.js";import"./Edit-27a0b317.js";/* empty css            */import"./telMask-0edd881b.js";import"./maska-6f10db43.js";const v={class:"flex justify-between items-center"},h=e("div",null,[e("h1",{class:"text-3xl text-center"}," Couriers ")],-1),k=e("i",{class:"fa fa-user-plus text-white"},null,-1),x=[k],w={__name:"Index",props:{couriers:Object,countries:Object},setup(i){const o=i,t=_(!1),c=()=>{t.value=!1},l=()=>{t.value=!0};return(u,C)=>(s(),a("div",null,[e("div",v,[h,e("div",null,[u.$page.props.is_manager?(s(),a("button",{key:0,class:"btn-success",onClick:l},x)):r("",!0)])]),f(m,{countries:o.countries,couriers:o.couriers.data},null,8,["countries","couriers"]),t.value?(s(),n(p,{key:0,onClose:c})):r("",!0),t.value?(s(),n(d,{key:1,countries:o.countries,onClose:c},null,8,["countries"])):r("",!0)]))}};export{w as default};