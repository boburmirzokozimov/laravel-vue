<script setup>

import NavLink from "@/Components/NavLink.vue";

const props = defineProps({
    chat_rooms: Object
})
</script>

<template>
    <div
        v-for="chat_room in props.chat_rooms"
        class="px-4 py-6 rounded-3xl text-white text-xl mr-2 bg-blue-400 mb-6 text-left"
    >
        <NavLink
            :href="`/chat/${chat_room.id}`"
            class="text-white"
            v-text="chat_room.client.full_name"
        />
    </div>
</template>

<style scoped>

</style>
