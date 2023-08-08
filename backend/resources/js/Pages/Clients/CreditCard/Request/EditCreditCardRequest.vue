<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const emit = defineEmits(['close'])

const props = defineProps({
    client: Object,
    credit_card_request: Object
})

let form = useForm({
    _method: 'PATCH',
    id: props.credit_card_request.id,
    name: props.credit_card_request.name,
    surname: props.credit_card_request.surname,
    middle_name: props.credit_card_request.middle_name,
    phone: props.credit_card_request.phone,
    birth_date: props.credit_card_request.birth_date,
    client_id: props.credit_card_request.client_id,
    scan_passport: props.credit_card_request.scan_passport,
    selfie_passport: props.credit_card_request.selfie_passport,

})

const handleSubmit = () => {
    form.post('/clients/' + props.credit_card_request.client_id + '/manage-credit-card/' + props.credit_card_request.id, {
        onSuccess: () => {
            toaster.success('Successfully edited')
        },
    })
    emit('close')

}

</script>

<template>
    <Head>
        <title>Edit Card Request</title>
    </Head>

    <div class="modal z-10 text-left">
        <h1 class="mb-6">Edit Card Request</h1>

        <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleSubmit">
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="surname_edit"
                >
                    Фамилия
                </label>

                <input
                    id="surname_edit"
                    v-model="form.surname"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="surname_edit"
                    type="text"
                />
                <div v-if="form.errors.surname" class="text-red-500 text-sm">{{ form.errors.surname }}</div>
            </div>

            <div class="mb-6">
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

            <div class="mb-6">
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

            <div class="mb-6">
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

            <div class="mb-6">
                <label

                    class="block mb-2 uppercase font-bold text-sm text-gray-700"

                    for="phone"
                >
                    Телефон
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
                    class="items-center mb-2 uppercase font-bold text-sm text-gray-700 flex"
                    for="scan_passport"
                >
                    Селфи с паспортом
                    <img :src="`/storage/${credit_card_request.scan_passport}`"
                         alt="" class="ml-2 rounded-full w-10 h-10 bg-cover object-center">
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
            <div class="mb-6">
                <label
                    class="items-center mb-2 uppercase font-bold text-sm text-gray-700 flex"
                    for="selfie_passport"
                >
                    Скан паспорта
                    <img :src="`/storage/${credit_card_request.selfie_passport}`"
                         alt="" class="ml-2 rounded-full w-10 h-10 bg-cover object-center">
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


            <div class="flex justify-end w-full">
                <button :disabled="form.processing" class="bg-blue-500 p-2 rounded-2xl text-white" type="submit">
                    Редактировать
                </button>
            </div>
        </form>

    </div>

</template>

<style lang="scss" scoped>
.modal {
    @apply fixed top-0 w-2/6 bg-white px-4 py-6 rounded-xl z-20;
    transform: translate(-125%, 5%);
}
</style>
