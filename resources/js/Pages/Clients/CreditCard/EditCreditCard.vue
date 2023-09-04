<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";
import {vMaska} from "maska"


const toaster = createToaster({ /* options */});

const emit = defineEmits(['close'])

const props = defineProps({
    credit_card: Object
})

let form = useForm({
    _method: 'PATCH',
    id: props.credit_card.id,
    client_id: props.credit_card.client_id,
    credit_card_request_id: props.credit_card.credit_card_request_id,
    card_number: props.credit_card.card_number,
    expire_date: props.credit_card.expire_date,
    name: props.credit_card.name,
    anonymous_name: props.credit_card.anonymous_name,
    anonymous_surname: props.credit_card.anonymous_surname,
    surname: props.credit_card.surname,
    middle_name: props.credit_card.middle_name,
})

const handleSubmit = () => {
    form
        .transform((data) => ({
            ...data,
            card_number: form.card_number.replaceAll(' ', '')
        }))
        .post('/credit-cards/' + props.credit_card.id, {
            onSuccess: () => {
                emit('close')
                toaster.success('Successfully edited')
            },
        })

}

</script>

<template>
    <Head>
        <title>Edit Card Request</title>
    </Head>

    <div class="modal z-10 text-left">
        <h1 class="mb-6">Edit VISA Card</h1>

        <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleSubmit">
            <div v-if="!credit_card.anonymous" class="mb-6">
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
                    name="name"
                    type="text"
                />
                <div v-if="form.errors.name" class="text-red-500 text-sm">{{
                        form.errors.name
                    }}
                </div>
            </div>
            <div v-if="!credit_card.anonymous" class="mb-6">
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
                <div v-if="form.errors.surname" class="text-red-500 text-sm">{{
                        form.errors.surname
                    }}
                </div>
            </div>
            <div v-if="!credit_card.anonymous" class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="middle_name"
                >
                    Очество
                </label>

                <input
                    id="middle_name"
                    v-model="form.middle_name"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    type="text"
                />
                <div v-if="form.errors.middle_name" class="text-red-500 text-sm">{{
                        form.errors.middle_name
                    }}
                </div>
            </div>
            <div v-if="credit_card.anonymous" class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="anonymous_name"
                >
                    Анонимная имя
                </label>

                <input
                    id="anonymous_name"
                    v-model="form.anonymous_name"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    type="text"
                />
                <div v-if="form.errors.anonymous_name" class="text-red-500 text-sm">{{
                        form.errors.anonymous_name
                    }}
                </div>
            </div>
            <div v-if="credit_card.anonymous" class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="anonymous_surname"
                >
                    Анонимная фамилия
                </label>

                <input
                    id="anonymous_surname"
                    v-model="form.anonymous_surname"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    type="text"
                />
                <div v-if="form.errors.anonymous_surname" class="text-red-500 text-sm">{{
                        form.errors.anonymous_surname
                    }}
                </div>
            </div>
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="card_number"
                >
                    Номер карты
                </label>

                <input
                    id="card_number"
                    v-model="form.card_number"
                    v-maska
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    data-maska="#### #### #### ####"
                    name="card_number"
                    placeholder="1234 5678 9123 4567"
                    type="text"
                />
                <div v-if="form.errors.card_number" class="text-red-500 text-sm">{{
                        form.errors.card_number
                    }}
                </div>
            </div>

            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="expire_date"
                >
                    Cрок действия
                </label>

                <input
                    id="expire_date"
                    v-model="form.expire_date"
                    v-maska
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    data-maska="##/##"
                    name="expire_date"
                    placeholder="12/34"
                    type="text"
                />
                <div v-if="form.errors.expire_date" class="text-red-500 text-sm">{{
                        form.errors.expire_date
                    }}
                </div>
            </div>

            <div class="flex justify-end w-full">
                <button :disabled="form.processing" class="btn-success" type="submit">
                    <i class="fa fa-check text-white"></i>
                </button>
            </div>
        </form>

    </div>

</template>

<style lang="scss" scoped>
.modal {
    @apply fixed top-0 w-2/6 bg-white px-4 py-6 rounded-xl z-20;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}
</style>
