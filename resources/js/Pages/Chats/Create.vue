<script setup>
import {router, useForm} from "@inertiajs/vue3";
import {ref} from "vue";

const props = defineProps({
    chat_room_id: null,
    client_id: null
})

let file = ref(null)
let isFile = ref(false)

const form = useForm({
    message: null,
    chat_room_id: props.chat_room_id,
    type: ''
})
const handleFileButton = (event) => {
    file = event.target.files[0]
    form.type = file['type'] === 'image/png' ? 'image' : 'pdf'
    router.post('/uploadFile', {
        message: file,
        chat_room_id: props.chat_room_id,
        type: form.type
    }, {
        preserveScroll: true
    })
    file.value = ''
}
const handleMessage = () => {
    router.post('/send/' + props.client_id, {
        message: form.message,
        chat_room_id: form.chat_room_id,
        client_id: props.client_id
    }, {
        preserveScroll: true
    })
    form.message = ''
}
</script>

<template>
    <div class=" mt-6">
        <form class="w-full mx-auto" method="post" @submit.prevent="handleMessage">
            <div class="mb-6  flex">
                <div class="relative">
                    <input
                        id="file"
                        class=" absolute opacity-0 w-full h-full cursor-pointer"
                        name="file"
                        type="file"
                        @input="(event) => handleFileButton(event)"
                    >
                    <button
                        class="btn-edit !bg-blue-400 "
                        style="border-radius: 1rem 0 0 1rem ;"
                    >Отправить файл
                    </button>
                </div>
                <input
                    id="message"
                    v-model="form.message"
                    class="border border-gray-200 w-full focus:border-none active:border-none active:outline-0 focus:outline-0"
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
