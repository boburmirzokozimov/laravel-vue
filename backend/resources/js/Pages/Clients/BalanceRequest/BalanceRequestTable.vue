<script setup>

import Modal from "@/Components/Modal.vue";
import {ref} from "vue";
import InfoPopUp from "@/Pages/Clients/BalanceRequest/InfoPopUp.vue";

const active = ref(false)
const show = ref(null)

const props = defineProps({
    balance_requests: Object
})

const handleButton = (id) => {
    show.value = id
    active.value = true
}

const closeModal = () => {
    active.value = false
    show.value = null
}
</script>

<template>
    <div class="flex flex-col">
        <div class="sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 border-b">
                        <tr>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                                #
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                                Date
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                                Sum
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                                Type
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr
                            v-for="balance_request in balance_requests"
                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 "
                        >
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                v-text="balance_request.id"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="balance_request.created_at"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="balance_request.sum"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="balance_request.type"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                <button
                                    class="btn-edit"
                                    @click="()=>handleButton(balance_request.id)"
                                >Просмотр деталей
                                </button>
                                <Modal v-if="active && balance_request.id === show" @close="closeModal"/>
                                <InfoPopUp
                                    v-if="active && balance_request.id === show"
                                    :balance_request="balance_request"
                                    @close="closeModal"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>


<style scoped>

</style>
