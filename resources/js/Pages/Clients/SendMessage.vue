<script setup>
import {useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const emit = defineEmits(['close'])

const props = defineProps({
    client: Object,
})

let form = useForm({
    message: props.client.message,
})

const handleSubmit = () => {
    form.post(`/clients/${props.client.id}/message`, {
        onSuccess: () => {
            emit('close')
            toaster.success('Successfully sent')
        },
    })
}
</script>

<template>
    <div class="modal z-10">
        <h1 class="mb-6">Send Message</h1>

        <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleSubmit">
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="name"
                >
                    Type the message
                </label>

                <textarea
                    id="name"
                    v-model="form.message"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="name"
                    type="text"
                />
                <div v-if="form.errors.message" class="text-red-500 text-sm">{{ form.errors.message }}</div>
            </div>

            <div class="flex justify-end w-full">
                <button :disabled="form.processing" class="bg-blue-500 p-2 rounded-2xl text-white" type="submit">
                    Send
                </button>
            </div>
        </form>
    </div>

</template>

<style scoped>
.modal {
    @apply absolute top-0 w-2/6 bg-white px-4 py-6 rounded-xl z-20;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
