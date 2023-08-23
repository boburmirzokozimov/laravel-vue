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
    anonymous: props.credit_card_request.anonymous,
    anonymous_name: props.credit_card_request.anonymous_name,
    anonymous_surname: props.credit_card_request.anonymous_surname,
})

const handleSubmit = () => {
    form.post('/clients/' + props.credit_card_request.client_id + '/manage-credit-card-anonymous/' + props.credit_card_request.id, {
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
        <h1 class="mb-6">Edit Card Request</h1>

        <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleSubmit">
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
                <div v-if="form.errors.anonymous_surname" class="text-red-500 text-sm">{{
                        form.errors.anonymous_surname
                    }}
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
    transform: translate(-85%, 75%);
}
</style>
