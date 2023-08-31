<script setup>
import Tabs from "@/Components/Tabs.vue";
import {ref} from "vue";
import MetalBalance from "@/Pages/Clients/Metal/MetalBalance.vue";

const active = ref('XAU')

const props = defineProps({
  metals: Object,
  metalTransactions: Object,
})
const data = ref([
  {
    name: "XAU",
  },
  {
    name: "XAG",
  },
  {
    name: "XPT",
  },
])
</script>

<template>
  <Tabs :active="active" :data="data"/>
  <MetalBalance
      v-for="metal in metals"
      :balance="metal.card_type === 'XAU'"/>
</template>

<style scoped>

</style>
