<script setup>
import {vMaska} from "maska"

const props = defineProps({
  name: String,
  type: String,
  modelValue: String,
  mask: String,
  placeholder: String,
})

const emit = defineEmits(['update:modelValue'])

</script>

<template>
  <div class="w-full">
    <label
        :for="props.name"
        class="font-semibold text-sm text-gray-600 pb-1 block"
    >{{ props.placeholder }}</label>
    <input
        :id="props.name"
        v-maska
        :data-maska="props.mask"
        :type="props.type"
        :value="props.modelValue"
        class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
        @input="emit('update:modelValue',$event.target.value)"
    >
  </div>
</template>

<style scoped>

</style>