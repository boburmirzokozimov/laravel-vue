<script setup>
import NavLink from "@/Components/NavLink.vue";
import {router, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";
import {watch} from "vue";
import {debounce} from "lodash";

const toaster = createToaster({ /* options */});

const props = defineProps({
    chat_rooms: Object
})

const handleClick = (id) => {
    router.post(`/chat-room/${id}`, {}, {
        onSuccess: () => {
            toaster.success('Successfully edited')
        }
    })
}

const filter = useForm({
    completed: '',
})

watch(filter, debounce(function (filter) {
    router.get(
        '/chat', {
            completed: filter.completed,
        }, {
            preserveState: true,
            replace: true,
        }
    )
}, 500))
</script>

<template>
    <div class="w-1/5 mb-6">
        <select id="category" v-model="filter.completed" class="h-full border border-gray-200 p-2 w-full rounded-2xl"
                name="category"
                required>
            <option value="">All</option>
            <option value="false">Active</option>
            <option value="true">Archive</option>
        </select>
    </div>
    <div
        v-for="chat_room in props.chat_rooms"
        class="rounded-2xl text-white text-xl mr-2 bg-blue-400 mb-6 text-left flex justify-between items-center"
    >
        <NavLink
            :class="chat_room.completed && 'py-4'"
            :href="`/chat/${chat_room.id}`"
            class="text-white w-11/12 ml-2"
            v-text="chat_room.client.full_name"
        />

        <div v-if="!chat_room.completed" class="flex items-center w-1/12">
            <button
                id="completed"
                class="btn-success"
                name="completed"
                type="button"
                @click="()=>handleClick(chat_room.id)"
            >
                Finish the chat
            </button>
        </div>
    </div>
</template>

<style scoped>

</style>
