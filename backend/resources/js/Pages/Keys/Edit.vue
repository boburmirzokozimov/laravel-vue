<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const emit = defineEmits(['close'])

const props = defineProps({
    keyObject: Object,
})

let form = useForm({
    account_number: props.keyObject.account_number,
    wallet_number: props.keyObject.wallet_number,
})

const handleSubmit = () => {
    form.patch('/keys/' + props.keyObject.id, {
        onSuccess: () => {
            emit('close')
            toaster.success('Successfully edited')
        },
    })
}
</script>

<template>
    <Head>
        <title>Update Key</title>
    </Head>

    <div class="modal z-10">
        <h1 class="mb-6">Update The Key</h1>

        <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleSubmit">
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="account_number"
                >
                    Расчетный счет
                </label>

                <input
                    id="account_number"
                    v-model="form.account_number"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="account_number"
                    type="text"
                />
                <div v-if="form.errors.account_number" class="text-red-500 text-sm">{{
                        form.errors.account_number
                    }}
                </div>
            </div>

            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="wallet_number"
                >
                    Кошелёк
                </label>

                <input
                    id="wallet_number"
                    v-model="form.wallet_number"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="wallet_number"
                    type="text"
                />
                <div v-if="form.errors.wallet_number" class="text-red-500 text-sm">{{ form.errors.wallet_number }}</div>
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
    transform: translate(-75%, 50%);
}
</style>
