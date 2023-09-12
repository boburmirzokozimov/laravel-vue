<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";
import NavLink from "@/Components/NavLink.vue";
import {vMaska} from "maska";
import {telMasks} from "@/telMask.js";

const toaster = createToaster({ /* options */});

const props = defineProps({
    user: Object,
    countries: Object,
    roles: Object,
})
let form = useForm({
    full_name: '',
    phone: '',
    country: '',
    role: '',
    tel_type: '',
    generateMask: '',
})

const handleChange = (e) => {
    form.generateMask = e
}

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
        <div class="flex max-w-2xl mx-auto items-center justify-between">
            <h1 class="mb-6">Create The User</h1>
            <div>
                <NavLink class="btn-success"
                         href="/users"
                >
                    <i class="fa fa-backward text-white"></i>
                </NavLink>
            </div>
        </div>

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
            <!--      <div class="mb-6">-->
            <!--        <vue-tel-input-->
            <!--            v-model="form.phone"-->
            <!--            :onlyCountries="['UZ','RU','US']"-->
            <!--            autocomplete-->
            <!--            dropdownOptions.showDialCodeInSelection-->
            <!--            dropdownOptions.showFlags-->
            <!--            inputClasses="border border-gray-200 p-2 w-full rounded-2xl"-->
            <!--            mode="international"-->
            <!--            wrapperClasses="border border-gray-200 p-2 w-full rounded-2xl"/>-->
            <!--      </div>-->
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
                        :data-maska="generateMask"
                        :placeholder="generateMask"
                        class="border border-gray-200 p-2 w-full rounded-br-2xl rounded-tr-2xl"
                        name="phone"
                        type="text"
                    />
                </div>

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

            <div class="mb-6">
                <select id="role" v-model="form.role" class="border border-gray-200 p-2 w-full rounded-2xl"
                        name="role"
                        required>
                    <option v-for="role in props.roles" :value="role.id" v-text="role.name.toUpperCase()"></option>
                </select>
                <div v-if="form.errors.role" class="text-red-500 text-sm">{{ form.errors.role }}</div>
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
