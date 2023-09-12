<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {vMaska} from "maska"
import {createToaster} from "@meforma/vue-toaster";
import {onMounted} from "vue";
import {telMasks} from "@/telMask.js";

const toaster = createToaster({ /* options */});

let form = useForm({
    full_name: '',
    phone: '',
    comments: '',
    auth_key: '',
    tel_type: '',
    generateMask: '',
})

const handleChange = (e) => {
    form.generateMask = e
}

onMounted(() => {
    function randomString(length, chars) {
        let result = '';
        for (let i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
        return result;
    }

    form.auth_key = randomString(12, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
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
        .post('/clients', {
            onSuccess: () => toaster.success('Successfully created'),
        })
}

</script>

<template>
    <Head>
        <title>Create Client</title>
    </Head>

    <div class="">
        <h1 class="mb-6">Create The Client</h1>

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
                    for="auth_key"
                >
                    Auth Key
                </label>

                <input
                    id="auth_key"
                    v-model="form.auth_key"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="auth_key"
                    type="text"
                />
                <div v-if="form.errors.auth_key" class="text-red-500 text-sm">{{ form.errors.auth_key }}</div>
            </div>

            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="comments"
                >
                    Comments
                </label>

                <textarea
                    id="comments"
                    v-model="form.comments"
                    class="border border-gray-200 p-2 w-full rounded-2xl px-2"
                    name="comments"
                    rows="10"
                />
                <div v-if="form.errors.comments" class="text-red-500 text-sm">{{ form.errors.comments }}</div>
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
