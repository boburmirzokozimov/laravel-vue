<script setup>

const props = defineProps({
  data: Object,
  active: null
})
</script>

<template>
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
</template>

<style scoped>

</style>
