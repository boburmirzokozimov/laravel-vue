<script setup>
import {ref} from "vue";
import Table from "@/Pages/Transactions/Metal/Table.vue";
import Paginator from "@/Components/Paginator.vue";
import Filter from "@/Pages/Transactions/Metal/Filter.vue";

const active = ref('XAU')

const props = defineProps({
  metalTransactions: Object,
  filters: Object
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
  <Filter :filters="props.filters"/>
  <Table :metalTransactions="metalTransactions.data"/>
  <Paginator :links="metalTransactions.links"/>
</template>

<style scoped>

</style>
