<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {vMaska} from "maska"
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const props = defineProps({
    user: Object,
    countries: Object,
})
let form = useForm({
    full_name: '',
    phone: '',
    country: '',
})

const handleSubmit = () => {
    form
        .transform((data) => ({
            ...data,
            phone: form.phone.replaceAll(' ', '')
                .replaceAll('-', '')
                .replace('+', '')
                .replace('(', '')
                .replace(')', '')
        }))
        .post('/users', {
            onSuccess: () => toaster.success('Successfully created'),
        })
}

</script>

<template>
    <Head>
        <title>Create User</title>
    </Head>

    <div class="">
        <h1 class="mb-6">Create The User</h1>

        <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleSubmit">
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="name"
                >
                    Full Name
                </label>

                <input
                    id="name"
                    v-model="form.full_name"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="name"
                    type="text"
                />
                <div v-if="form.errors.full_name" class="text-red-500 text-sm">{{ form.errors.full_name }}</div>
            </div>

            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="email"
                >
                    Phone
                </label>

                <input
                    id="email"
                    v-model="form.phone"
                    v-maska
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    data-maska="+998 (##) ###-##-##"
                    name="email"
                    type="text"
                />
                <div v-if="form.errors.phone" class="text-red-500 text-sm">{{ form.errors.phone }}</div>
            </div>

            <div class="mb-6">
                <select id="category" v-model="form.country" class="border border-gray-200 p-2 w-full rounded-2xl"
                        name="category"
                        required>
                    <option v-for="country in props.countries" :value="country.name" v-text="country.name"></option>
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
    @apply absolute top-0 w-1/6 bg-white px-4 py-6 rounded-xl z-20;
    transform: translate(-200%, 50%);
}
</style>
