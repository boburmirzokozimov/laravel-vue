<script setup>
import ChatRooms from "@/Pages/Chats/ChatRooms.vue";
import {onBeforeUnmount} from "vue";

const props = defineProps({
    chat_rooms: Object
})

const sub = Centrifugo.newSubscription('finHelpRooms');
sub.subscribe();
sub.on('publication', function (ctx) {
    props.chat_rooms.push(ctx.data.chatRoom)
});
onBeforeUnmount(() => {
    Centrifugo.removeSubscription(sub);
})
</script>

<template>
    <div class="bg-gray-200 rounded-xl p-6">
        <div class="mt-6 mb-6">
            <h2 class="mt-6 text-2xl font-semibold italic">
                Chats
            </h2>
        </div>

        <ChatRooms :chat_rooms="props.chat_rooms"/>

    </div>
</template>

<style scoped>

</style>
