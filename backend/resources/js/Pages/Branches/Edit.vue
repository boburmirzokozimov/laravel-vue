<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const emit = defineEmits(['close'])

const props = defineProps({
    branch: Object,
})

let form = useForm({
    lat: props.branch.lat,
    lon: props.branch.lon,
    address: props.branch.address,
    contact_number: props.branch.contact_number,
})

const handleSubmit = () => {
    form.patch('/branches/' + props.branch.id, {
        onSuccess: () => {
            emit('close')
            toaster.success('Successfully edited')
        },
    })
}

</script>

<template>
    <Head>
        <title>Update Branch</title>
    </Head>

    <div class="modal z-10">
        <h1 class="mb-6">Update The Branch</h1>

        <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleSubmit">
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

<style lang="scss" scoped>
.modal {
    @apply absolute top-0 w-2/6 bg-white px-4 py-6 rounded-xl z-20;
    transform: translate(-100%, 25%);
}
</style>
