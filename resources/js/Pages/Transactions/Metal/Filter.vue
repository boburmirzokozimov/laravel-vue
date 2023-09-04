<script setup>
import {watch} from "vue";
import {debounce} from "lodash";
import {router, useForm} from "@inertiajs/vue3";

const props = defineProps({
  filters: Object,
  client_id: Number,
})

const filter = useForm({
  status: props.filters.status,
  sort: props.filters.sort,
  date: props.filters.date,
})

watch(filter, debounce(function (filter) {
  router.get(
      `/transactions/metal`, {
        status: filter.status,
        sort: filter.sort,
        date: filter.date,
      }, {
        preserveState: true,
        replace: true,
        preserveScroll: true
      }
  )
}, 500))
const handleReset = () => {
  filter.status = ''
  filter.sort = ''
  filter.date = ''
}
</script>

<template>
  <div class="flex justify-center mb-6 mt-6">
    <div class="w-1/3 mr-2">
      <input
          id="date"
          v-model="filter.date"
          class="border border-gray-200 p-2 w-full rounded-2xl"
          type="date">
    </div>
    <div class="w-1/3 mr-2">
      <select
          id="status"
          v-model="filter.status"
          class="h-full border border-gray-200 p-2 w-full rounded-2xl"
          name="type">
        <option value="SUCCESS">SUCCESS</option>
        <option value="FAILED">FAILED</option>
        <option value="WAITING">WAITING</option>
      </select>
    </div>
    <div class="w-1/3 mr-2">
      <select
          id="sort"
          v-model="filter.sort"
          class="h-full border border-gray-200 p-2 w-full rounded-2xl"
          name="sort">
        <option value="XAU">XAU</option>
        <option value="XAG">XAG</option>
        <option value="XPT">XPT</option>
      </select>
    </div>
    <div class=" mr-2">
      <button
          class="btn-secondary w-full h-full"
          @click.prevent="handleReset"
      >
        <i class="fa fa-remove text-white"></i>
      </button>
    </div>
  </div>
</template>

<style scoped>

</style>
