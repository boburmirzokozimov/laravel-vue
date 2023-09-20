<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";
import {vMaska} from "maska"

const toaster = createToaster({ /* options */});

const emit = defineEmits(['close'])

const props = defineProps({
    credit_card_request: Object
})

let form = useForm({
    credit_card_request_id: props.credit_card_request.id,
    card_number: props.credit_card_request.card_number,
    expire_date: props.credit_card_request.expire_date,
    client_id: props.credit_card_request.client_id,
})

const handleSubmit = () => {
    form
        .transform((data) => ({
            ...data,
            card_number: form.card_number.replaceAll(' ', '')
        }))
        .post('/clients/' + props.credit_card_request.client_id + '/manage-credit-card/' + props.credit_card_request.id, {
            onSuccess: () => {
                emit('close')
                toaster.success('Successfully activated')
            },
        })

}

</script>

<template>
    <Head>
        <title>Карта</title>
    </Head>

    <div class="modal z-10 text-left">
        <h1 class="mb-6">Карта</h1>

        <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleSubmit">
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
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
