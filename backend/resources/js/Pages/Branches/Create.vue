<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const props = defineProps({
  countries: Object
})

let form = useForm({
  lat: '',
  lon: '',
  address: '',
  contact_number: '',
  country_id: 0,
})

const handleSubmit = () => {
  form.post('/branches', {
    onSuccess: () => toaster.success('Successfully created'),
  })
}

</script>

<template>
  <Head>
    <title>Create Branch</title>
  </Head>

  <div class="modal z-10">
    <h1 class="mb-6">Create The Branch</h1>

    <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleSubmit">
      <div class="mb-6">
        <select id="category" v-model="form.country_id" class="border border-gray-200 p-2 w-full rounded-2xl"
                name="category"
                required>
          <option v-for="country in props.countries" :value="country.id" v-text="country.name"></option>
        </select>
        <div v-if="form.errors.country_id" class="text-red-500 text-sm">{{ form.errors.country_id }}</div>
      </div>
      <div class="mb-6">
        <label
            class="block mb-2 uppercase font-bold text-sm text-gray-700"
            for="lat"
        >
          Latitude
        </label>

        <input
            id="lat"
            v-model="form.lat"
            class="border border-gray-200 p-2 w-full rounded-2xl"
            name="lat"
            type="text"
        />
        <div v-if="form.errors.lat" class="text-red-500 text-sm">{{ form.errors.lat }}</div>
      </div>

      <div class="mb-6">
        <label
            class="block mb-2 uppercase font-bold text-sm text-gray-700"
            for="lon"
        >
          Longitude
        </label>

        <input
            id="lon"
            v-model="form.lon"
            class="border border-gray-200 p-2 w-full rounded-2xl"
            name="lon"
            type="text"
        />
        <div v-if="form.errors.lon" class="text-red-500 text-sm">{{ form.errors.lon }}</div>
      </div>

      <div class="mb-6">
        <label
            class="block mb-2 uppercase font-bold text-sm text-gray-700"
            for="address"
        >
          Address
        </label>

        <input
            id="address"
            v-model="form.address"
            class="border border-gray-200 p-2 w-full rounded-2xl"
            name="address"
            type="text"
        />
        <div v-if="form.errors.address" class="text-red-500 text-sm">{{ form.errors.address }}</div>
      </div>

      <div class="mb-6">
        <label
            class="block mb-2 uppercase font-bold text-sm text-gray-700"
            for="contact_number"
        >
          Contact Number
        </label>

        <input
            id="contact_number"
            v-model="form.contact_number"
            class="border border-gray-200 p-2 w-full rounded-2xl px-2"
            name="contact_number"
        />
        <div v-if="form.errors.contact_number" class="text-red-500 text-sm">{{
            form.errors.contact_number
          }}
        </div>
      </div>

      <div class="flex justify-end w-full">
        <button :disabled="form.processing" class="bg-blue-500 p-2 rounded-2xl text-white" type="submit">Submit
        </button>
      </div>
    </form>
  </div>
</template>

