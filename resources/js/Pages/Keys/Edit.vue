<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const emit = defineEmits(['close'])

const props = defineProps({
    keyObject: Object,
})

let form = useForm({
    account_number_sepa: props.keyObject.account_number_sepa,
    account_number_swift: props.keyObject.account_number_swift,
    wallet_number_erc: props.keyObject.wallet_number_erc,
    wallet_number_trc: props.keyObject.wallet_number_trc,
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
                    Расчетный счет - SEPA
                </label>

                <input
                    id="account_number"
                    v-model="form.account_number_sepa"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="account_number"
                    type="text"
                />
                <div v-if="form.errors.account_number_sepa" class="text-red-500 text-sm">{{
                        form.errors.account_number_sepa
                    }}
                </div>
            </div>
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="account_number"
                >
                    Расчетный счет - SWIFT
                </label>

                <input
                    id="account_number"
                    v-model="form.account_number_swift"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="account_number"
                    type="text"
                />
                <div v-if="form.errors.account_number_swift" class="text-red-500 text-sm">{{
                        form.errors.account_number_swift
                    }}
                </div>
            </div>

            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="wallet_number"
                >
                    Кошелёк - ERC
                </label>

                <input
                    id="wallet_number"
                    v-model="form.wallet_number_erc"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="wallet_number"
                    type="text"
                />
                <div v-if="form.errors.wallet_number_erc" class="text-red-500 text-sm">{{
                        form.errors.wallet_number_erc
                    }}
                </div>
            </div>
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="wallet_number"
                >
                    Кошелёк - TRC
                </label>

                <input
                    id="wallet_number"
                    v-model="form.wallet_number_trc"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="wallet_number"
                    type="text"
                />
                <div v-if="form.errors.wallet_number_trc" class="text-red-500 text-sm">{{
                        form.errors.wallet_number_trc
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
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
