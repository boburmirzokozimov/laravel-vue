<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";
import {telMasks} from "@/telMask.js";
import {vMaska} from "maska";

const toaster = createToaster({ /* options */});

const emit = defineEmits(['close'])
const props = defineProps({
  countries: Object
})
let form = useForm({
  fullName: '',
  phone: '',
  country: '',
  status: '',
  tel_type: '',
  generateMask: '',
})

const handleChange = (e) => {
  form.generateMask = e
}

const handleEdit = () => {
  form
      .transform((data) => ({
        ...data,
        phone: form.phone.replaceAll(' ', '')
            .replaceAll('-', '')
            .replace('+', '')
            .replace('(', '')
            .replace(')', '')
      })).post('/couriers', {
    onSuccess: () => {
      emit('close')
      toaster.success('Successfully created')
    }
  })

}
</script>

<template>
  <Head>
    <title>Edit Courier</title>
  </Head>

  <div class="w-[500px] modal z-10">
    <h1 class="mb-6">Create The Courier</h1>

    <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleEdit">
      <div class="mb-6">
        <label
            class="block mb-2 uppercase font-bold text-sm text-gray-700"
            for="fullName"
        >
          ФИО
        </label>

        <input
            id="fullName"
            v-model="form.fullName"
            class="border border-gray-200 p-2 w-full rounded-2xl"
            name="fullName"
            type="text"
        />
        <div v-if="form.errors.fullName" class="text-red-500 text-sm">{{ form.errors.fullName }}</div>
      </div>

      <div class="mb-6">
        <label
            class="block mb-2 uppercase font-bold text-sm text-gray-700"
            for="phone"
        >
          Phone
        </label>
        <div class="flex">
          <select
              id=""
              v-model="form.tel_type"
              class="border border-gray-200 p-2 w-2/12 rounded-bl-2xl rounded-tl-2xl "
              name=""
              @change="(e)=>handleChange(e.target.value)">
            <option v-for="(key,value) in telMasks" :value="key" v-text="value"></option>

          </select>
          <input
              id="phone"
              v-model="form.phone"
              v-maska
              :data-maska="form.generateMask"
              :placeholder="form.generateMask"
              class="border border-gray-200 p-2 w-full rounded-br-2xl rounded-tr-2xl"
              name="phone"
              type="text"
          />
        </div>

        <div v-if="form.errors.phone" class="text-red-500 text-sm">{{ form.errors.phone }}</div>
      </div>


      <div class="mb-6">
        <label
            class="block mb-2 uppercase font-bold text-sm text-gray-700"
            for="country"
        >
          Страна
        </label>
        <select id="country" v-model="form.country" class="border border-gray-200 p-2 w-full rounded-2xl"
                name="country"
                required>
          <option
              v-for="country in props.countries"
              :selected="form.country === country.name"
              :value="country.name"
              v-text="country.name"
          ></option>
        </select>
        <div v-if="form.errors.country" class="text-red-500 text-sm">{{ form.errors.country }}</div>
      </div>

      <div class="mb-6">
        <label
            class="block mb-2 uppercase font-bold text-sm text-gray-700"
            for="status"
        >
          Статус
        </label>
        <select id="status" v-model="form.status" class="border border-gray-200 p-2 w-full rounded-2xl"
                name="status"
                required>
          <option
              selected
              value="active"
          >
            Активный
          </option>
          <option
              value="inactive"
          >
            Неактивный
          </option>
          <option
              value="blocked"
          >
            Блокированный
          </option>
        </select>
        <div v-if="form.errors.country" class="text-red-500 text-sm">{{ form.errors.country }}</div>
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
  @apply absolute top-0  bg-white px-4 py-6 rounded-xl z-20;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
