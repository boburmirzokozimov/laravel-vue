<script setup>

import Modal from "@/Components/Modal.vue";
import {ref} from "vue";
import InfoPopUp from "@/Pages/Clients/BalanceRequest/InfoPopUp.vue";
import {createToaster} from "@meforma/vue-toaster";
import {router} from "@inertiajs/vue3";

const active = ref(false)
const show = ref(null)
const toaster = createToaster({ /* options */});

const props = defineProps({
    balance_requests: Object,
    transaction_statuses: Object
})

const handleButton = (id) => {
    show.value = id
    active.value = true
}

const closeModal = () => {
    active.value = false
    show.value = null
}
const handleStatus = (status, id) => {
    router.post(`/transactions/${id}/status`, {
        status: status
    }, {
        onSuccess: () => {
            toaster.success('Статус изменён')
        },
        onError: (error) => {
            toaster.error(error.message)
        },
        preserveScroll: true
    })
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
                            <th class="text-sm font-medium text-gray-900 px-6 py-4" scope="col">
                                #
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4" scope="col">
                                Date
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4" scope="col">
                                Sum
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4" scope="col">
                                Type
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4" scope="col">
                                Status
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4" scope="col">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody v-for="balance_request in balance_requests">
                        <tr

                            v-if="!balance_request.invoice_file"
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
                                <form>
                                    <select
                                        id="category"
                                        class="border border-gray-200 p-2 w-full rounded-2xl"
                                        name="category"
                                        @change.prevent="handleStatus($event.target.value,balance_request.id)"
                                    >
                                        <option
                                            v-for="status in props.transaction_statuses"
                                            v-show="status !== 'SUCCESS'"
                                            :selected="status === balance_request.status"
                                            :value="status"
                                            v-text="status"
                                        ></option>
                                    </select>
                                </form>
                            </td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                <button v-if="balance_request.status === 'HOLD' || balance_request.status === 'WAITING'"
                                        class="btn-edit mr-2"
                                        @click="()=>handleButton(balance_request.id)">
                                    <i class="fa fa-eye text-white"></i>
                                </button>

                                <button v-if="balance_request.status === 'HOLD' || balance_request.status === 'WAITING'"
                                        class="btn-danger"
                                        @click="handleStatus('CANCELED', balance_request.id)">
                                    <i class="fa fa-remove text-white"></i>
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
