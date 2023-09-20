<script setup>

import {ref} from "vue";
import Modal from "@/Components/Modal.vue";
import Edit from "@/Pages/Cards/Edit.vue";
import Activate from "@/Pages/Cards/Activate.vue";
import Show from "@/Pages/Cards/Show.vue";
import Anonymous from "@/Pages/Cards/Anonymous.vue";
import {router} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const active = ref(false)
const show = ref(null)
const toaster = createToaster({ /* options */});

const props = defineProps({
    cards: Object,
})

const handleButton = (id) => {
    show.value = id
    active.value = true
}
const handleActivateButton = (id) => {
    show.value = 'activate_' + id
    active.value = true
}
const handleDeleteButton = (id) => {
    router.post(`/cards/${id}`, {}, {
        onSuccess: () => toaster.success('Deleted Successfully')
    })
}

const handleShowButton = (id, isAnonymous) => {
    if (isAnonymous) {
        show.value = 'show_anonymous_' + id
    } else {
        show.value = 'show_' + id
    }
    active.value = true
}

const closeModal = () => {
    active.value = false
    show.value = null
}
</script>

<template>
    <div>
        <h2>Заявки на выпуск карты</h2>
    </div>
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
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 " scope="col">
                                На псевдоним
                            </th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr
                            v-for="credit_card_request in cards"
                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 "
                        >
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                v-text="credit_card_request.id"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="credit_card_request.anonymous ? credit_card_request.anonymous_name :credit_card_request.surname"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="credit_card_request.anonymous ? credit_card_request.anonymous_surname : credit_card_request.name"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text=" credit_card_request.anonymous ? '-' : credit_card_request.middle_name"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                v-text="credit_card_request.anonymous?'Да':'Нет'"
                            ></td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                <div class="">
                                    <button
                                        class=" btn-secondary mr-2"
                                        @click="()=>handleShowButton(credit_card_request.id,credit_card_request.anonymous)">
                                        <i class="fa fa-eye text-white"></i>
                                    </button>
                                    <button
                                        class=" btn-edit mr-2"
                                        @click="()=>handleButton(credit_card_request.id)">
                                        <i class="fa fa-edit text-white"></i>
                                    </button>
                                    <button
                                        v-if="$page.props.is_manager"
                                        class="mt-1 btn-success mr-2"
                                        @click="()=>handleActivateButton(credit_card_request.id)">
                                        <i class="fa fa-check text-white"></i>
                                    </button>
                                    <button
                                        v-if="$page.props.is_manager"
                                        class="mt-1 btn-danger"
                                        @click="()=>handleDeleteButton(credit_card_request.id)">
                                        <i class="fa fa-trash text-white"></i>
                                    </button>
                                </div>
                                <Modal v-if="active && credit_card_request.id === show" @close="closeModal"/>
                                <Modal v-if="active && 'activate_'+credit_card_request.id === show"
                                       @close="closeModal"/>
                                <Modal v-if="active && 'show_'+credit_card_request.id === show"
                                       @close="closeModal"/>
                                <Modal v-if="active && 'show_anonymous_'+credit_card_request.id === show"
                                       @close="closeModal"/>
                                <Edit
                                    v-if="active && credit_card_request.id === show"
                                    :credit_card_request="credit_card_request"
                                    @close="closeModal"/>
                                <Show
                                    v-if="active && 'show_'+credit_card_request.id === show"
                                    :credit_card_request="credit_card_request"
                                    @close="closeModal"/>
                                <Anonymous
                                    v-if="active && 'show_anonymous_'+credit_card_request.id === show"
                                    :credit_card_request="credit_card_request"
                                    @close="closeModal"/>
                                <Activate
                                    v-if="active && 'activate_'+credit_card_request.id === show"
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
