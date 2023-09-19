<script setup>
import Create from "@/Pages/Chats/Create.vue";
import {onBeforeUnmount, ref} from "vue";

const props = defineProps({
    chat_room: Object,
})
const sub = Centrifugo.newSubscription(`fin_help:chat#${props.chat_room.client_id}`);
const isOnline = ref(false)
sub.subscribe();

sub.on('publication', function (ctx) {
    props.chat_room.messages.push(ctx.data.message)
}).on('subscribing', function (ctx) {
    console.log(isOnline.value, ctx)
    isOnline.value = true
}).on('unsubscribed', function (ctx) {
    isOnline.value = false
});
onBeforeUnmount(() => {
    Centrifugo.removeSubscription(sub);
})
const getType = (type) => {
    return type === 'App\\Models\\User\\User'
}

</script>

<template>
    <div class="bg-gray-200 rounded-xl p-6">
        <div class="mt-6 mb-6">
            <h2 class="mt-6 text-2xl font-semibold italic">
                Chat <span
                :class="isOnline ? 'text-green-500' : 'text-gray-500'"
                class="lowercase align-sub text-sm"
                v-text="isOnline ? '(Online)' : '(Offline)'"></span>
            </h2>
        </div>

        <div
            v-for="message in props.chat_room.messages"
            :class="getType(message.messageble_type) ?
                'justify-end' :
                'justify-start' "
            class="flex relative"
        >
            <div
                :class="getType(message.messageble_type) ?
                'text-right rounded-tl-3xl rounded-tr-xl mr-2 rounded-bl-3xl bg-blue-400' :
                'text-left rounded-tr-3xl rounded-tl-xl ml-2 rounded-br-3xl bg-gray-400' "
                class="mb-2 py-3 px-4 max-w-2xl text-white flex flex-col dot"
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
                <div v-if="message.type ==='pdf'">
                    <a
                        :href="`/storage/${message.message}`"
                        class="rounded-lg bg-gray-200 px-4 py-1"
                        target="_blank">
                        Открыть Файл
                    </a>
                </div>
                <div v-if="message.type === 'audio'">
                    <audio controls>
                        <source :src="`/storage/${message.message}`" type="audio/ogg">
                        <source :src="`/storage/${message.message}`" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
                <div
                    v-if="!message.type"
                    v-text="message.message"
                >
                </div>
                <div
                    class="text-sm text-gray-500 mt-2"
                >
                    <div
                        v-if="message.created_at.isToday"
                        v-text="message.created_at.diffForHumans"
                    >
                    </div>
                    <div
                        v-else
                        v-text="message.created_at.formatted"
                    >
                    </div>
                </div>
            </div>
        </div>

        <Create :chat_room_id="props.chat_room.id" :client_id="props.chat_room.client_id"/>

    </div>


</template>

<style scoped>
.dot::after {
    content: '';
    
}
</style>
