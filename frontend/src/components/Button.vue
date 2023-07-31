<script setup>
const props = defineProps({
  color: String,
  text: String,
})
</script>

<template>
  <button
      :class="props.color"
      class="transition duration-200  focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block"
      type="submit"
  >
    <span class="inline-block mr-2" v-text="props.text"></span>
  </button>
</template>

<style scoped>

</style>