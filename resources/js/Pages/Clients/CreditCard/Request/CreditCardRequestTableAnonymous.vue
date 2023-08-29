<script setup>

import {ref} from "vue";
import Modal from "@/Components/Modal.vue";
import ActivateCreditCard from "@/Pages/Clients/CreditCard/ActivateCreditCard.vue";
import EditAnonymousCreditCardRequest from "@/Pages/Clients/CreditCard/Request/EditAnonymousCreditCardRequest.vue";

const active = ref(false)
const show = ref(null)

const props = defineProps({
    credit_card_requests_anonymous: Object
})

const handleButton = (id) => {
    show.value = 'edit_' + id
    active.value = true
}
const handleActivateButton = (id) => {
    show.value = 'activate_' + id
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
                                Предпочитаемое Фамилия
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                                Предпочитаемое Имя
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                                Дата создание заявки
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                                Действие
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr
                            v-for="credit_card_request in credit_card_requests_anonymous"
                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 "
                        >
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                v-text="credit_card_request.id"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="credit_card_request.anonymous_surname"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="credit_card_request.anonymous_name"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="credit_card_request.created_at"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                <div class="flex">
                                    <button class="btn-edit w-1/2 mr-2"
                                            @click="()=>handleButton(credit_card_request.id)">
                                        Редактировать
                                    </button>
                                    <button
                                        v-if="$page.props.is_manager"
                                        class=" btn-success w-1/2"
                                        @click="()=>handleActivateButton(credit_card_request.id)"
                                    >Активоровать
                                    </button>
                                </div>
                                <Modal v-if="active && 'activate_'+credit_card_request.id === show"
                                       @close="closeModal"/>
                                <Modal v-if="active && 'edit_'+credit_card_request.id === show"
                                       @close="closeModal"/>
                                <EditAnonymousCreditCardRequest
                                    v-if="active && 'edit_'+credit_card_request.id === show"
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
