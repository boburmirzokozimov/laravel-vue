<script>
import {createToaster} from "@meforma/vue-toaster";

export default {
    layout: null
}
const toaster = createToaster({ /* options */});

</script>

<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {ref} from "vue";
import {vMaska} from "maska"

let form = useForm({
    phone: "",
    login_code: "",
})

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
            <form class="border px-6 py-4 rounded-2xl " method="post"
                  style="background-color: #3e444a;"
                  @submit.prevent="handleSubmit">
                <h1 class="mb-6">Enter your phone number</h1>

                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-sm base_color"
                        for="phone"
                    >
                        Phone
                    </label>
                    <input
                        id="phone"
                        v-model="form.phone"
                        v-maska
                        class="border border-gray-200 p-2 w-full rounded-2xl text-black"
                        data-maska="+998 (##) ###-##-##"
                        name="phone"
                        required
                        type="text"
                    />
                    <div v-if="form.errors.phone" class="text-red-500 text-sm">{{ form.errors.phone }}</div>
                </div>

                <div class="mb-6">
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
                        type="text"
                    />
                    <div v-if="form.errors.login_code" class="text-red-500 text-sm">{{ form.errors.login_code }}</div>
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
