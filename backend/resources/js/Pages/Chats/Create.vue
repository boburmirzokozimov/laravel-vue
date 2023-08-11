<script setup>
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    chat_room_id: null,
})

const form = useForm({
    message: '',
    chat_room_id: props.chat_room_id
})

const handleMessage = () => {
    form.post('/send', {
        preserveScroll: true
    })
    form.message = ''
}
</script>

<template>
    <div class=" mt-6">
        <form class="w-full mx-auto" method="post" @submit.prevent="handleMessage">
            <div class="mb-6  flex">
                <input
                    id="message"
                    v-model="form.message"
                    class="border border-gray-200 w-full rounded-2xl focus:border-none active:border-none active:outline-0 focus:outline-0"
                    name="message"
                    style="border-bottom-right-radius: 0;border-top-right-radius: 0"
                    type="text"
                />
                <button class="btn-edit !bg-blue-400"
                        style="border-radius: 0 1rem  1rem 0 ;">
                    Send
                </button>
            </div>
        </form>
    </div>
</template>

<style scoped>

</style>
