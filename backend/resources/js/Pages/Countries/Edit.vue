<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const emit = defineEmits(['close'])

const props = defineProps({
  country: Object,
})

let form = useForm({
  _method: 'PATCH',
  name: props.country.name,
  name_common: props.country.name_common,
  name_official: props.country.name_official,
  flag: null,
})

const handleSubmit = () => {
  form.post('/countries/' + props.country.id, {
    onSuccess: () => {
      emit('close')
      toaster.success('Successfully edited')
    },
  })
}
</script>

<template>
  <Head>
    <title>Update Country</title>
  </Head>

  <div class="modal z-10">
    <h1 class="mb-6">Update The Country</h1>

    <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleSubmit">
      <div class="mb-6">
        <label
            class="block mb-2 uppercase font-bold text-sm text-gray-700"
            for="name"
        >
          Имя(Русском)
        </label>

        <input
            id="name"
            v-model="form.name"
            class="border border-gray-200 p-2 w-full rounded-2xl"
            name="name"
            type="text"
        />
        <div v-if="form.errors.name" class="text-red-500 text-sm">{{
            form.errors.name
          }}
        </div>
      </div>
      <div class="mb-6">
        <label
            class="block mb-2 uppercase font-bold text-sm text-gray-700"
            for="name_common"
        >
          Имя(Английском)
        </label>

        <input
            id="name_common"
            v-model="form.name_common"
            class="border border-gray-200 p-2 w-full rounded-2xl"
            name="name_common"
            type="text"
        />
        <div v-if="form.errors.name_common" class="text-red-500 text-sm">{{
            form.errors.name_common
          }}
        </div>
      </div>

      <div class="mb-6">
        <label
            class="block mb-2 uppercase font-bold text-sm text-gray-700"
            for="name_official"
        >
          Имя(Израильском)
        </label>

        <input
            id="name_official"
            v-model="form.name_official"
            class="border border-gray-200 p-2 w-full rounded-2xl"
            name="name_official"
            type="text"
        />
        <div v-if="form.errors.name_official" class="text-red-500 text-sm">{{
            form.errors.name_official
          }}
        </div>
      </div>
      <div v-if="!form.anonymous" class="mb-6">
        <label
            class="block mb-2 uppercase font-bold text-sm text-gray-700"
            for="scan_passport"
        >
          Флаг
        </label>

        <input
            id="flag"
            class="border border-gray-200 p-2 w-full rounded-2xl"
            name="flag"
            type="file"
            @input="form.flag = $event.target.files[0]"
        />
        <div v-if="form.errors.flag" class="text-red-500 text-sm">{{ form.errors.flag }}</div>
      </div>

      <div class="flex justify-end w-full">
        <button :disabled="form.processing" class="bg-blue-500 p-2 rounded-2xl text-white" type="submit">Submit
        </button>
      </div>
    </form>
  </div>

</template>

<style lang="scss" scoped>
.modal {
  @apply absolute top-0 w-2/6 bg-white px-4 py-6 rounded-xl z-20;
  transform: translate(-105%, 50%);
}
</style>
