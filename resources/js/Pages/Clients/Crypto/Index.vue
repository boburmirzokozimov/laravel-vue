<script setup>
import {ref} from "vue";
import MetalBalance from "@/Pages/Clients/Crypto/MetalBalance.vue";
import Table from "@/Pages/Clients/Crypto/Table.vue";
import Paginator from "@/Components/Paginator.vue";
import NavLink from "@/Components/NavLink.vue";

const active = ref('BTC')

const props = defineProps({
  metals: Object,
  client: Object,
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
  <div class="mb-6">
    <div class="flex justify-between">
      <div class="flex">
        <NavLink
            :href="`/clients/${props.client.id}`"
            as="h1" class="cursor-pointer text-center">
          Main Balance/
        </NavLink>
        <NavLink
            :href="`/metal/${props.client.id}`"
            as="h1" class="cursor-pointer text-center">
          Metal Balance/
        </NavLink>
        <h1 class=" text-center text-gray-400">
          Crypto Balance
        </h1>
      </div>
      <div class="flex items-center">
        <NavLink class="btn-success " href="/clients">
          <i class="fa fa-backward text-white"></i>
        </NavLink>
      </div>
    </div>
  </div>
  <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
    <li
        v-for="route in data"
        :class="active === route.name && 'bg-white'"
        aria-current="page"
        class="cursor-pointer inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500"
        @click="active = route.name"
        v-text="route.name">
    </li>
  </ul>
  <template
      v-for="metal in metals"
  >
    <MetalBalance
        v-if="metal.card_type === active"
        :balance=" metal"
        :client="props.client"/>
  </template>

  <Table :metal-transactions="metalTransactions.data"/>
  <Paginator :links="metalTransactions.links"/>
</template>

<style scoped>

</style>
