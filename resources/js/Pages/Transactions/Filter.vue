<script setup>
import {watch} from "vue";
import {debounce} from "lodash";
import {router, useForm} from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";

const props = defineProps({
  filters: Object,
})

const filter = useForm({
  full_name: props.filters.full_name,
  status: props.filters.status,
  type: props.filters.type,
  date: props.filters.date,
})

watch(filter, debounce(function (filter) {
  router.get(
      '/transactions/balance', {
        full_name: filter.full_name,
        status: filter.status,
        type: filter.type,
        date: filter.date,
      }, {
        preserveState: false,
        replace: false,
      }
  )
}, 500))

</script>

<template>
  <div class="flex justify-center mb-6">
    <div class="w-1/4 mr-2">
      <input
          id="search"
          v-model="filter.full_name"
          class="border border-gray-200 p-2 w-full rounded-2xl"
          name="search"
          placeholder="Name..."
          type="search">
    </div>
    <div class="w-1/4 mr-2">
      <input
          id="date"
          v-model="filter.date"
          class="border border-gray-200 p-2 w-full rounded-2xl"
          type="date">
    </div>
    <div class="w-1/4 mr-2">
      <select
          id="type"
          v-model="filter.type"
          class="h-full border border-gray-200 p-2 w-full rounded-2xl"
          name="type">
        <option value="CASH">CASH</option>
        <option value="CASHLESS">CASHLESS</option>
        <option value="USDT">USDT</option>
      </select>
    </div>
    <div class="w-1/4 mr-2">
      <select
          id="status"
          v-model="filter.status"
          class="h-full border border-gray-200 p-2 w-full rounded-2xl"
          name="type">
        <option value="WAITING">WAITING</option>
        <option value="HOLD">HOLD</option>
        <option value="VERIFICATION">VERIFICATION</option>
      </select>
    </div>
    <div class="mr-2">
      <NavLink
          as="button"
          class="btn-secondary w-full h-full"
          href="/transactions/balance"
      >
        <i class="fa fa-remove text-white"></i>
      </NavLink>
    </div>
  </div>
</template>

<style scoped>

</style>
