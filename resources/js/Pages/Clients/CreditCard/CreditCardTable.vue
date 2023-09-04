<script setup>

import {ref} from "vue";
import Modal from "@/Components/Modal.vue";
import EditCreditCard from "@/Pages/Clients/CreditCard/EditCreditCard.vue";
import {router} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const active = ref(false)
const show = ref(null)

const props = defineProps({
    credit_cards: Object,
})

const handleButton = (id) => {
    show.value = 'edit_card_' + id
    active.value = true
}
const handleDeleteButton = (id) => {
    router.post(`/credit-cards/${id}/destroy`, {}, {
        _method: 'DELETE',
        onSuccess: () => {
            toaster.success('Successfully deleted card')

        }
    })
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
                                Владелец
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 " scope="col">
                                Баланс
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 " scope="col">
                                Номер Карты
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 " scope="col">
                                Cрок Действия
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 " scope="col">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr
                            v-for="credit_card in credit_cards"
                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 "
                        >
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                v-text="credit_card.id"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="credit_card.owner_name"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="credit_card.balance"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="credit_card.card_number"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="credit_card.expire_date"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                <div class="">
                                    <button
                                        class=" btn-edit mr-2"
                                        @click="()=>handleButton(credit_card.id)">
                                        <i class="fa fa-edit text-white "></i>
                                    </button>
                                    <button
                                        class="mt-1 btn-danger"
                                        @click="()=>handleDeleteButton(credit_card.id)">
                                        <i class="fa fa-trash text-white"></i>
                                    </button>
                                </div>
                                <Modal v-if="active && 'edit_card_'+credit_card.id === show"
                                       @close="closeModal"/>
                                <EditCreditCard
                                    v-if="active && 'edit_card_'+credit_card.id === show"
                                    :credit_card="credit_card"
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
