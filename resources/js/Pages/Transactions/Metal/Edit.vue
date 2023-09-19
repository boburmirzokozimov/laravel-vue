<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const emit = defineEmits(['close'])

const toaster = createToaster({ /* options */});

const props = defineProps({
    metalTransaction: Object,
})

let form = useForm({
    sum: null,
})

const handleSubmit = () => {
    form.post(`/metal/${props.metalTransaction.client_id}/` + props.metalTransaction.id, {
        onSuccess: () => {
            emit('close')
            toaster.success('Successfully edited')
        },
        preserveScroll: true,
        onError: (error) => {
            toaster.error(error.message)
        },
    })
}

</script>

<template>
    <Head>
        <title>Edit Metal Transaction</title>
    </Head>

    <div class="modal z-10 text-left">
        <h1 class="mb-6">Edit Metal Transaction</h1>

        <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleSubmit">
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="sum"
                >
                    Сумма
                </label>

                <input
                    id="sum"
                    v-model="form.sum"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="sum"
                    type="number"
                />
                <div v-if="form.errors.sum" class="text-red-500 text-sm">{{
                        form.errors.sum
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
