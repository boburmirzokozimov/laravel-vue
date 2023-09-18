<script setup>
import {Head, router} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";
import Paginator from "@/Components/Paginator.vue";
import Filter from "@/Pages/Transactions/Filter.vue";
import InfoPopUp from "@/Pages/Transactions/InfoPopUp.vue";
import Modal from "@/Components/Modal.vue";
import {ref} from "vue";

const toaster = createToaster({ /* options */});
const active = ref(false)
const show = ref(null)
const props = defineProps({
    balance_transactions: Object,
    transaction_statuses: Object,
    filters: Object
})
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
    <Head>
        <title>Balance Transactions</title>
    </Head>
    <Filter :filters="filters"/>
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
                                Client
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
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr
                            v-for="balance_transaction in balance_transactions.data"
                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 "
                        >
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                v-text="balance_transaction.id"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="balance_transaction.client_name"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="balance_transaction.sum"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="balance_transaction.type"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                <form>
                                    <select
                                        id="category"
                                        class="text-center border border-gray-200 p-2 w-full rounded-2xl"
                                        name="category"
                                        @change.prevent="handleStatus($event.target.value,balance_transaction.id)"
                                    >
                                        <option
                                            v-for="status in props.transaction_statuses"
                                            v-show="status !== 'SUCCESS'"
                                            :selected="status === balance_transaction.status"
                                            :value="status"
                                            class="text-center"
                                            v-text="status"
                                        ></option>
                                    </select>
                                </form>
                            </td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                <button
                                    class="btn-edit mr-2"
                                    @click="()=>handleButton(balance_transaction.id)">
                                    <i class="fa fa-eye text-white"></i>
                                </button>

                                <button
                                    v-if="balance_transaction.status === 'HOLD' || balance_transaction.status === 'WAITING'|| balance_transaction.status === 'VERIFICATION'"
                                    class="btn-danger"
                                    @click="handleStatus('CANCELED', balance_transaction.id)">
                                    <i class="fa fa-remove text-white"></i>
                                </button>
                                <Modal
                                    v-if="active && balance_transaction.id === show"
                                    style="background-color: rgba(0, 0, 0, 0.15)" @close="closeModal"/>
                                <InfoPopUp
                                    v-if="active && balance_transaction.id === show"
                                    :balance_request="balance_transaction"
                                    @close="closeModal"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <Paginator :links="balance_transactions.links"/>
</template>

<style scoped>

</style>
