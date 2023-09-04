<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const emit = defineEmits(['close'])

const props = defineProps({
    client: Object,
})

let form = useForm({
    full_name: props.client.full_name,
    phone: props.client.phone,
    comments: props.client.comments,
    auth_key: props.client.auth_key,
    is_active: props.client.is_active
})

const handleSubmit = () => {
    form.patch('/clients/' + props.client.id, {
        onSuccess: () => {
            emit('close')
            toaster.success('Successfully edited')
        },
    })
}

</script>

<template>
    <Head>
        <title>Create Client</title>
    </Head>

    <div class="modal z-10">
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
                    for="email"
                >
                    Phone
                </label>

                <input
                    id="phone"
                    v-model="form.phone"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="phone"
                    type="text"
                />
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

            <div class="mb-6 flex">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700 mr-2"
                    for="is_active"
                >
                    Active
                </label>

                <input
                    id="is_active"
                    v-model="form.is_active"
                    :checked="form.is_active"
                    class="border border-gray-200 p-2 rounded-2xl mr-6"
                    name="is_active"
                    type="checkbox"
                />
                <div v-if="form.errors.is_active" class="text-red-500 text-sm">{{ form.errors.is_active }}</div>

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
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
