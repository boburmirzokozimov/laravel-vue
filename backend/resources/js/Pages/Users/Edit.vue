<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const emit = defineEmits(['close'])
const props = defineProps({
    user: Object,
    countries: Array
})
let form = useForm({
    full_name: props.user.full_name,
    phone: props.user.phone,
    country: props.user.country,
    is_banned: props.user.is_banned,
    is_active: props.user.is_active,
})

const handleEdit = () => {
    form.patch('/users/' + props.user.id, {
        onSuccess: () => {
            emit('close')
            toaster.success('Successfully edited')
        }
    })

}
</script>

<template>
    <Head>
        <title>Edit User</title>
    </Head>

    <div class="modal z-10">
        <h1 class="mb-6">Edit The User</h1>

        <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleEdit">
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
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="email"
                    type="text"
                />
                <div v-if="form.errors.phone" class="text-red-500 text-sm">{{ form.errors.phone }}</div>
            </div>

            <div class="mb-6">
                <select id="category" v-model="form.country" class="border border-gray-200 p-2 w-full rounded-2xl"
                        name="category"
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

                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700 mr-2"
                    for="is_banned"
                >
                    Banned
                </label>

                <input
                    id="is_banned"
                    v-model="form.is_banned"
                    :checked="form.is_banned"
                    class="border border-gray-200 p-2 rounded-2xl mr-2"
                    name="is_banned"
                    type="checkbox"
                />
                <div v-if="form.errors.is_banned" class="text-red-500 text-sm">{{ form.errors.is_banned }}</div>
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
