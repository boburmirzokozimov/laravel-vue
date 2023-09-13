<script>
import {createToaster} from "@meforma/vue-toaster";
import {telMasks} from "@/telMask.js";

export default {
  layout: null
}
const toaster = createToaster({ /* options */});
</script>

<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {ref} from "vue";
import {vMaska} from "maska"
import {telMasks} from "@/telMask.js";

let form = useForm({
  phone: "",
  login_code: "",
  tel_type: '',
  generateMask: '',
})
const handleChange = (e) => {
  form.generateMask = e
}
const is_submitted = ref(false)

const handleSubmit = () => {
  if (!is_submitted.value) {
    console.log("submit")
    form
        .transform((data) => ({
          ...data,
          phone: form.phone.replaceAll(' ', '')
              .replaceAll('-', '')
              .replace('+', '')
              .replace('(', '')
              .replace(')', '')
        }))
        .post('/submit', {
          onSuccess: (e) => {
            console.log(e)
            is_submitted.value = true
          },
        })
  } else {
    form
        .transform((data) => ({
          ...data,
          phone: form.phone.replaceAll(' ', '')
              .replaceAll('-', '')
              .replace('+', '')
              .replace('(', '')
              .replace(')', '')
        }))
        .post('/verify')
  }

}
</script>

<template>
  <Head>
    <title>Login</title>
  </Head>

  <main class="flex justify-center items-center min-h-screen">
    <section class="max-w-full mx-auto px-4 base_color">
      <form class="border px-6 py-4 rounded-2xl w-[500px]" method="post"
            style="background-color: #3e444a;"
            @submit.prevent="handleSubmit">
        <h1 v-if="!is_submitted" class="mb-6">Enter your phone number</h1>
        <h1 v-else class="mb-6">Enter your sms code</h1>
        <div v-if="!is_submitted" class="mb-6">
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
                class="border border-gray-200 p-2 w-2/12 rounded-bl-2xl rounded-tl-2xl text-gray-600"
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
                class="border border-gray-200 p-2 w-full rounded-br-2xl rounded-tr-2xl text-gray-600"
                name="phone"
                type="text"
            />
          </div>

          <div v-if="form.errors.phone" class="text-red-500 text-sm">{{ form.errors.phone }}</div>
        </div>

        <div v-else class="mb-6">
          <label
              class="block mb-2 uppercase font-bold text-sm base_color"
              for="login_code"
          >
            Code
          </label>

          <input
              id="login_code"
              v-model="form.login_code"
              v-maska
              :disabled="!is_submitted"
              class="border border-gray-200 p-2 w-full rounded-2xl text-black"
              data-maska="####"
              name="login_code"
              required
              type="password"
          />
          <div v-if="form.errors.login_code" class="text-red-500 text-sm">{{ form.errors.login_code }}</div>
          <div v-show="is_submitted" class="text-green-500 text-sm">Ведите код подтверждение</div>
        </div>

        <div class="flex justify-end w-full">
          <button :disabled="form.processing" class="bg-blue-500 p-2 rounded-2xl text-white" type="submit">
            Submit
          </button>
        </div>
      </form>
    </section>
  </main>
</template>


<style scoped>

</style>
