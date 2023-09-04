<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";
import {vMaska} from "maska"
import NavLink from "@/Components/NavLink.vue";

const toaster = createToaster({ /* options */});

const emit = defineEmits(['close'])

const props = defineProps({
    branch: Object,
})

let form = useForm({
    _method: "PATCH",
    name: props.branch.name,
    lat: props.branch.lat,
    lon: props.branch.lon,
    address: props.branch.address,
    full_address: props.branch.full_address,
    contact_number: props.branch.contact_number,
    contact_email: props.branch.contact_email,
    start_hour: props.branch.start_hour,
    end_hour: props.branch.end_hour,
    photo: props.branch.photo,
})

const handleSubmit = () => {
    form.post('/branches/' + props.branch.id, {
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

    <div class="z-10">
        <div class=" max-w-2xl mx-auto flex justify-between items-center">
            <div>
                <h1 class="mb-6">{{ branch.name }}</h1>
            </div>
            <div>
                <NavLink
                    as="button"
                    class="btn-success"
                    href='/branches'>
                    <i class="fa fa-backward text-white"></i>
                </NavLink>
            </div>
        </div>

        <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleSubmit">
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="lat"
                >
                    Name
                </label>

                <input
                    id="lat"
                    v-model="form.name"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="lat"
                    type="text"
                />
                <div v-if="form.errors.name" class="text-red-500 text-sm">{{ form.errors.name }}</div>
            </div>

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
                    for="full_address"
                >
                    Full Address
                </label>

                <input
                    id="full_address"
                    v-model="form.full_address"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="full_address"
                    type="text"
                />
                <div v-if="form.errors.full_address" class="text-red-500 text-sm">{{ form.errors.full_address }}</div>
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
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="contact_email"
                >
                    Contact Email
                </label>

                <input
                    id="contact_email"
                    v-model="form.contact_email"
                    class="border border-gray-200 p-2 w-full rounded-2xl px-2"
                    name="contact_email"
                    type="email"
                />
                <div v-if="form.errors.contact_email" class="text-red-500 text-sm">{{
                        form.errors.contact_email
                    }}
                </div>
            </div>
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="working_hours"
                >
                    Start Hour
                </label>

                <input
                    id="working_hours"
                    v-model="form.start_hour"
                    v-maska
                    class="border border-gray-200 p-2 w-full rounded-2xl px-2"
                    data-maska="##.##-##.##"
                    name="working_hours"
                    type="text"
                />
                <div v-if="form.errors.start_hour" class="text-red-500 text-sm">{{
                        form.errors.start_hour
                    }}
                </div>
            </div>
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="working_hours"
                >
                    End Hour
                </label>

                <input
                    id="working_hours"
                    v-model="form.end_hour"
                    v-maska
                    class="border border-gray-200 p-2 w-full rounded-2xl px-2"
                    data-maska="##.##-##.##"
                    name="working_hours"
                    type="text"
                />
                <div v-if="form.errors.end_hour" class="text-red-500 text-sm">{{
                        form.errors.end_hour
                    }}
                </div>
            </div>

            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="scan_passport"
                >
                    Photo
                    <img v-if="branch.photo" :src="`/storage/${branch.photo}`"
                         alt="" class="ml-2 rounded-full w-10 h-10 bg-cover object-center">
                </label>

                <input
                    id="scan_passport"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="scan_passport"
                    type="file"
                    @input="form.photo = $event.target.files[0]"
                />
                <div v-if="form.errors.photo" class="text-red-500 text-sm">{{ form.errors.photo }}</div>
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
