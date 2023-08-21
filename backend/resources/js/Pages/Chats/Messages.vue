<script setup>
import Create from "@/Pages/Chats/Create.vue";

const props = defineProps({
    chat_room: Object,
})

Echo.private(`chat.${props.chat_room.id}.${props.chat_room.client_id}`)
    .listen('MessageSentByClient', (e) => {
        props.chat_room.messages.push(JSON.parse(e.message))
    });

const getType = (type) => {
    return type === 'App\\Models\\User\\User'
}

</script>

<template>
    <div class="bg-gray-200 rounded-xl p-6">
        <div class="mt-6 mb-6">
            <h2 class="mt-6 text-2xl font-semibold italic">
                Chat
            </h2>
        </div>

        <div
            v-for="message in props.chat_room.messages"
            :class="getType(message.messageble_type) ?
                'justify-end' :
                'justify-start' "
            class="flex"
        >
            <div
                :class="getType(message.messageble_type) ?
                'text-right rounded-tl-3xl rounded-tr-xl mr-2 rounded-bl-3xl bg-blue-400' :
                'text-left rounded-tr-3xl rounded-tl-xl ml-2 rounded-br-3xl bg-gray-400' "
                class="mb-2 py-3 px-4 w-1/2 text-white"
            >
                <div v-if="message.type ==='image'">
                    <img :src="`/storage/${message.message}`" alt="image">
                </div>
                <div v-if="message.type ==='doc'">
                    <a
                        :href="`/storage/${message.message}`"
                        class="rounded-lg bg-gray-200 px-4 py-1"
                        target="_blank">
                        Открыть Файл
                    </a>
                </div>
                <div
                    v-if="!message.type"
                    v-text="message.message"
                >
                </div>
            </div>
        </div>

        <Create :chat_room_id="props.chat_room.id"/>

    </div>


</template>

<style scoped>

</style>
