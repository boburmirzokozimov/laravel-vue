<script setup>
import {Head} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const emit = defineEmits(['close'])

const props = defineProps({
    credit_card_request: Object
})

</script>

<template>
    <Head>
        <title>Show Card Request</title>
    </Head>

    <div class="modal z-10 text-left">
        <h1 class="mb-6">Show Card Request</h1>
        <div class="flex flex-col">
            <div class="sm:mx-0.5 lg:mx-0.5 ">
                <div class="py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full">
                    <div class="overflow-hidden">
                        <table class="min-w-full rounded-2xl">
                            <tbody class="rounded-2xl">
                            <tr class="border-b border-t rounded-2xl">
                                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    scope="col">
                                    #
                                </th>
                                <td
                                    class="bg-white px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                                    v-text="credit_card_request.id"
                                ></td>
                            </tr>
                            <tr class="border-b">
                                <th class=" w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    scope="col">
                                    Предпочитаемое Фамилия
                                </th>
                                <td
                                    class="bg-white px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                                    v-text="credit_card_request.anonymous_surname"
                                ></td>
                            </tr>
                            <tr class="border-b">
                                <th class=" w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    scope="col">
                                    Предпочитаемое Имя
                                </th>
                                <td
                                    class="bg-white px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                                    v-text="credit_card_request.anonymous_name"
                                ></td>
                            </tr>
                            <tr class="border-b">
                                <th class=" w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    scope="col">
                                    Дата создание заявки
                                </th>
                                <td
                                    class="bg-white px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                                    v-text="credit_card_request.formattedDate.formattedCreatedDate"
                                ></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<style lang="scss" scoped>
.modal {
    @apply fixed bg-white px-4 py-6 rounded-xl z-20;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
