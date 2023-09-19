<script setup>
import Table from "@/Pages/Couriers/Table.vue";
import {router} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const getDesc = (notification) => {
    if (notification.type === 'message') {
        return `Message was sent by ${notification.notifiable.messageble.full_name}`
    }
    if (notification.type === 'transaction replenish') {
        return `New transaction by ${notification.notifiable.full_name}`
    }
    if (notification.type === 'metal transaction') {
        return `New metal transaction by ${notification.notifiable.full_name}`
    }
    if (notification.type === 'crypto transaction') {
        return `New crypto transaction by ${notification.notifiable.full_name}`
    }
}
const getType = (notification) => {
    if (notification.type === 'message') {
        return `New message`
    }
    if (notification.type === 'transaction replenish') {
        return `New transaction`
    }
    if (notification.type === 'metal transaction') {
        return `New metal transaction`
    }
    if (notification.type === 'crypto transaction') {
        return `New crypto transaction`
    }
}

const handleClick = (notification) => {
    if (notification.type === 'message') {
        return router.visit(`/chat/${notification.notifiable.chat_room_id}`)
    } else {
        return router.visit(`/transactions/balance/?full_name=${notification.notifiable.full_name}`)
    }
}
const handleMarkButton = (id) => {
    router.post(`/notifications/${id}`, {}, {
        onSuccess: () => toaster.success('Marked as read')
    })
}

</script>

<template>
    <div>
        <h1 class="text-3xl">
            Dashboard
        </h1>
    </div>
    <div v-if="$page.props.notifications.length > 0" class="flex flex-col">
        <div class="">
            <div class="py-2 inline-block mx-auto w-full">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 border-b">
                        <tr>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 " scope="col">
                                #
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 " scope="col">
                                Тип
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 " scope="col">
                                Дата
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 " scope="col">
                                Опсисание
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 " scope="col">

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="notification in $page.props.notifications"
                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 text-left">
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center"
                                v-text="notification.id"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center"
                                v-text="getType(notification)"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center"
                                v-text="notification.created_at"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center"
                                v-text="getDesc(notification)"
                            >
                            </td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center"
                            >
                                <button class=" btn-success mr-2"
                                        @click="()=>handleMarkButton(notification.id)"
                                >
                                    Mark as read
                                </button>
                                <button class="btn-edit" @click="()=>handleClick(notification)">
                                    Click to see
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <h2 class="text-2xl">
            Nothing new so far
        </h2>
    </div>
</template>

<style scoped>

</style>
