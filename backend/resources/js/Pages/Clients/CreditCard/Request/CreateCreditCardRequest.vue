<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";
import {vMaska} from "maska"

const toaster = createToaster({ /* options */});

const props = defineProps({
    client: Object,
})

const form = useForm({
    name: "",
    surname: "",
    middle_name: "",
    phone: "",
    birth_date: "",
    client_id: props.client.id,
    scan_passport: null,
    selfie_passport: null,
    anonymous: false,
    anonymous_surname: "",
    anonymous_name: "",
})

const handleSubmit = () => {
    if (!form.anonymous) {
        form
            .transform((data) => ({
                ...data,
                phone: form.phone.replaceAll(' ', '')
                    .replaceAll('-', '')
                    .replace('+', '')
                    .replace('(', '')
                    .replace(')', '')
            }))
            .post('/clients/' + props.client.id + '/manage-credit-card', {
                onSuccess: () => toaster.success('Successfully created'),
            })
    } else {
        form.post('/clients/' + props.client.id + '/manage-credit-card-anonymous', {
            onSuccess: () => toaster.success('Successfully created'),
        })
    }

}
</script>

<template>
    <Head>
        <title>Создать VISA Карту</title>
    </Head>

    <div class="">
        <h1 class="mb-6">Создать VISA Карту</h1>

        <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleSubmit">
            <div class="mb-6">
                <button
                    :class="form.anonymous ? 'text-gray-700':'bg-green-600 text-white'" class="w-1/2 p-4 rounded-md"
                    type="button"
                    @click="form.anonymous = false"
                >
                    Катра на своё имя
                </button>
                <button :class="form.anonymous ? 'bg-green-600 text-white':'text-gray-700'" class="w-1/2 p-4 rounded-md"
                        type="button"
                        @click="form.anonymous = true">
                    Карта на псевдоним
                </button>
            </div>

            <div v-if="!form.anonymous" class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="surname"
                >
                    Фамилия
                </label>

                <input
                    id="surname"
                    v-model="form.surname"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="surname"
                    type="text"
                />
                <div v-if="form.errors.surname" class="text-red-500 text-sm">{{ form.errors.surname }}</div>
            </div>

            <div v-if="!form.anonymous" class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="name"
                >
                    Имя
                </label>

                <input
                    id="name"
                    v-model="form.name"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="surname"
                    type="text"
                />
                <div v-if="form.errors.name" class="text-red-500 text-sm">{{ form.errors.name }}</div>
            </div>

            <div v-if="!form.anonymous" class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="middle_name"
                >
                    Отчество
                </label>

                <input
                    id="middle_name"
                    v-model="form.middle_name"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="middle_name"
                    type="text"
                />
                <div v-if="form.errors.middle_name" class="text-red-500 text-sm">{{ form.errors.middle_name }}</div>
            </div>

            <div v-if="!form.anonymous" class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="birth_date"
                >
                    Дата рождения
                </label>

                <input
                    id="birth_date"
                    v-model="form.birth_date"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="birth_date"
                    type="date"
                />
                <div v-if="form.errors.birth_date" class="text-red-500 text-sm">{{ form.errors.birth_date }}</div>
            </div>

            <div v-if="!form.anonymous" class="mb-6">
                <label

                    class="block mb-2 uppercase font-bold text-sm text-gray-700"

                    for="phone"
                >
                    Телефон
                </label>

                <input
                    id="phone"
                    v-model="form.phone"
                    v-maska
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    data-maska="+998 (##) ###-##-##"
                    name="phone"
                    type="text"
                />
                <div v-if="form.errors.phone" class="text-red-500 text-sm">{{ form.errors.phone }}</div>
            </div>

            <div v-if="!form.anonymous" class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="scan_passport"
                >
                    Селфи с паспортом
                </label>

                <input
                    id="scan_passport"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="scan_passport"
                    type="file"
                    @input="form.scan_passport = $event.target.files[0]"
                />
                <div v-if="form.errors.scan_passport" class="text-red-500 text-sm">{{ form.errors.scan_passport }}</div>
            </div>
            <div v-if="!form.anonymous" class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="selfie_passport"
                >
                    Скан паспорта
                </label>

                <input
                    id="selfie_passport"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="selfie_passport"
                    type="file"
                    @input="form.selfie_passport = $event.target.files[0]"
                />
                <div v-if="form.errors.selfie_passport" class="text-red-500 text-sm">{{
                        form.errors.selfie_passport
                    }}
                </div>
            </div>

            <div v-else>
                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-sm text-gray-700"
                        for="anonymous_surname"
                    >
                        Предпочитаемое Фамилия
                    </label>

                    <input
                        id="anonymous_surname"
                        v-model="form.anonymous_surname"
                        class="border border-gray-200 p-2 w-full rounded-2xl"
                        name="anonymous_surname"
                        type="text"
                    />
                    <div v-if="form.errors.anonymous_surname" class="text-red-500 text-sm">
                        {{ form.errors.anonymous_surname }}
                    </div>
                </div>

                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-sm text-gray-700"
                        for="anonymous_name"
                    >
                        Предпочитаемое Имя
                    </label>

                    <input
                        id="anonymous_name"
                        v-model="form.anonymous_name"
                        class="border border-gray-200 p-2 w-full rounded-2xl"
                        name="anonymous_name"
                        type="text"
                    />
                    <div v-if="form.errors.anonymous_name" class="text-red-500 text-sm">{{
                            form.errors.anonymous_name
                        }}
                    </div>
                </div>

            </div>

            <div class="flex justify-end w-full">
                <button :disabled="form.processing" class="bg-blue-500 p-2 rounded-2xl text-white" type="submit">Создать
                </button>
            </div>
        </form>
    </div>

</template>

<style scoped>

</style>
