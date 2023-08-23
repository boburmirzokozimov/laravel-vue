<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

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
})

const handleEdit = () => {
    form.post('/couriers', {
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

    <div class="modal z-10">
        <h1 class="mb-6">Edit The Courier</h1>

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
                    for="email"
                >
                    Номер телефона
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
    @apply absolute top-0 w-1/6 bg-white px-4 py-6 rounded-xl z-20;
    transform: translate(160%, 50%);
}
</style>
