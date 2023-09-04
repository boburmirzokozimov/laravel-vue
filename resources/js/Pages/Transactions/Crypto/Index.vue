<script setup>
import {ref} from "vue";
import Table from "@/Pages/Transactions/Crypto/Table.vue";
import Paginator from "@/Components/Paginator.vue";
import Filter from "@/Pages/Transactions/Crypto/Filter.vue";

const active = ref('BTC')

const props = defineProps({
  filters: Object,
  metalTransactions: Object,
})
const data = ref([
  {
    name: "BTC",
  },
  {
    name: "ETH",
  },
  {
    name: "BNB",
  },
  {
    name: "ADA",
  },
  {
    name: "DOT",
  },
])
</script>

<template>
  <Filter :filters="props.filters"/>
  <Table :metal-transactions="metalTransactions.data"/>
  <Paginator :links="metalTransactions.links"/>
</template>

<style scoped>

</style>
