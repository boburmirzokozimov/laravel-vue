<script setup>
import Input from "@/components/Input.vue";
import Button from "@/components/Button.vue";
import {computed, onMounted, reactive, ref} from "vue";
import http from "@/helpers/http";
import {useRouter} from "vue-router";
import GuestLayout from "@/layouts/GuestLayout.vue";

const router = useRouter()
let is_submitted = ref(false)
const credentials = reactive({
  phone: null,
  login_code: null,
})

const filteredCredentials = computed(() => {
  return {
    phone: credentials.phone.replaceAll(' ', '')
        .replaceAll('-', '')
        .replace('(', '')
        .replace(')', '')
        .replace('+', ''),
    login_code: credentials.login_code
  }
})

const handleSubmit = () => {
  http().post('/api/submit', filteredCredentials.value)
      .then((res) => {
        console.log(res)
        is_submitted.value = true
      })
      .catch((err) => console.error(err))
}

const handleVerifySubmit = () => {
  http().post('/api/verify', filteredCredentials.value)
      .then((res) => {
        console.log(res)
        localStorage.setItem('token', res.data)
        router.push({
          name: 'dashboard'
        })
      })
      .catch((err) => console.error(err))
}

onMounted(() => {
  if (localStorage.getItem('token')) {
    router.push({
      name: 'dashboard'
    })
  }
})
</script>

<template>
  <guest-layout>
    <main class="">
      <div class="w-1/5 h-1/4 border rounded-md grid place-items-center bg-white shadow-sm">
        <form
            v-if="!is_submitted"
            class="w-3/4"
            method="post"
            @submit.prevent="handleSubmit"
        >
          <Input
              v-model="credentials.phone"
              mask="+998 (##) ###-##-##"
              name="phone"
              placeholder="Enter your phone number"
              type="text"
          />
          <hr class="mb-4">
          <Button
              color="bg-blue-500 hover:bg-blue-600 focus:bg-blue-700"
              text="Login"
          />
        </form>

        <form v-else
              action=""
              class="w-3/4"
              method="post"
              @submit.prevent="handleVerifySubmit"
        >
          <Input
              v-model="credentials.login_code"
              mask="####"
              name="login_code"
              placeholder="Enter your SMS code"
              type="text"
          />
          <hr class="mb-4">
          <Button
              color="bg-blue-500 hover:bg-blue-600 focus:bg-blue-700"
              text="Submit"
          />
        </form>
      </div>
    </main>
  </guest-layout>
</template>
