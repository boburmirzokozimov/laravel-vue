<script setup>

import {ref} from "vue";
import Modal from "@/Components/Modal.vue";
import ActivateCreditCard from "@/Pages/Clients/CreditCard/ActivateCreditCard.vue";
import EditCreditCardRequest from "@/Pages/Clients/CreditCard/Request/EditCreditCardRequest.vue";
import Show from "@/Pages/Cards/Show.vue";

const active = ref(false)
const show = ref(null)

const props = defineProps({
    credit_card_requests: Object,
    credit_card_requests_anonymous: Object
})

const handleButton = (id) => {
    show.value = id
    active.value = true
}
const handleActivateButton = (id) => {
    show.value = 'activate_' + id
    active.value = true
}
const handleShowButton = (id) => {
    show.value = 'show_' + id
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
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 " scope="col">
                                #
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 " scope="col">
                                Фамилия
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 " scope="col">
                                Имя
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 " scope="col">
                                Отчество
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr
                            v-for="credit_card_request in credit_card_requests"
                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 "
                        >
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                v-text="credit_card_request.id"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="credit_card_request.surname"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="credit_card_request.name"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="credit_card_request.middle_name"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                <div class="">
                                    <button
                                        class=" btn-secondary mr-2"
                                        @click="()=>handleShowButton(credit_card_request.id)">
                                        <i class="fa fa-eye text-white"></i>
                                    </button>
                                    <button
                                        class=" btn-edit mr-2"
                                        @click="()=>handleButton(credit_card_request.id)">
                                        <i class="fa fa-edit text-white"></i>
                                    </button>
                                    <button
                                        v-if="$page.props.is_manager"
                                        class="mt-1 btn-success"
                                        @click="()=>handleActivateButton(credit_card_request.id)">
                                        <i class="fa fa-check text-white"></i>
                                    </button>
                                </div>
                                <Modal v-if="active && credit_card_request.id === show" @close="closeModal"/>
                                <Modal v-if="active && 'activate_'+credit_card_request.id === show"
                                       @close="closeModal"/>
                                <Modal v-if="active && 'show_'+credit_card_request.id === show"
                                       @close="closeModal"/>
                                <Show
                                    v-if="active && 'show_'+credit_card_request.id === show"
                                    :credit_card_request="credit_card_request"
                                    @close="closeModal"/>
                                <EditCreditCardRequest
                                    v-if="active && credit_card_request.id === show"
                                    :client="props.client"
                                    :credit_card_request="credit_card_request"
                                    @close="closeModal"/>
                                <ActivateCreditCard
                                    v-if="active && 'activate_'+credit_card_request.id === show"
                                    :client="props.client"
                                    :credit_card_request="credit_card_request"
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
