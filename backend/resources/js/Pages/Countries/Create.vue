<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

let form = useForm({
  name: '',
  name_common: '',
  name_official: '',
  flag: null,
})

const handleSubmit = () => {
  form.post('/countries', {
    onSuccess: () => toaster.success('Successfully created'),
  })
}

</script>

<template>
  <Head>
    <title>Create Country</title>
  </Head>

  <div class="modal z-10">
    <h1 class="mb-6">Create Country</h1>

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

