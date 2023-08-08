<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";
import {vMaska} from "maska"

const toaster = createToaster({ /* options */});

const emit = defineEmits(['close'])

const props = defineProps({
    client: Object,
    credit_card: Object
})

let form = useForm({
    _method: 'PATCH',
    id: props.credit_card.id,
    client_id: props.credit_card.client_id,
    credit_card_request_id: props.credit_card.credit_card_request_id,
    card_number: props.credit_card.card_number,
    expire_date: props.credit_card.expire_date,
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
                <button :disabled="form.processing" class="bg-blue-500 p-2 rounded-2xl text-white" type="submit">
                    Активировать
                </button>
            </div>
        </form>

    </div>

</template>

<style lang="scss" scoped>
.modal {
    @apply fixed top-0 w-2/6 bg-white px-4 py-6 rounded-xl z-20;
    transform: translate(-100%, 80%);
}
</style>
