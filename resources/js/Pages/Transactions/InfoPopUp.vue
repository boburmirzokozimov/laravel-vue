<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});
const emit = defineEmits(['close'])

const props = defineProps({
    balance_request: Object,
})

const form = useForm({})
const handleButton = () => {
    form.post('/clients/' + props.balance_request.client_id + '/manage-balance/' + props.balance_request.id, {
        onError: (error) => {
            toaster.error(error.message)
        },
        preserveScroll: true,
        onSuccess: () => {
            toaster.success('Процесс выполнен')
        }
    })
    emit('close')
}
</script>

<template>
    <Head>
        <title>Инфо об заявке</title>
    </Head>

    <div class="modal z-10 w-3/4">
        <h1 class="mb-6">Инфо об заявке</h1>

        <div>
            <div class="flex flex-col">
                <div class="sm:mx-0.5 lg:mx-0.5">
                    <div class="py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <tbody class="">
                                <tr class="border-b border-t">
                                    <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                        scope="col">
                                        Сумма
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                                        v-text="balance_request.sum"
                                    ></td>
                                </tr>
                                <tr v-if="balance_request.type === 'USDT'" class="border-b">
                                    <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                        scope="col">
                                        Валюта
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                                        v-text="balance_request.usdt_type"
                                    ></td>
                                </tr>
                                <tr v-if="balance_request.type === 'CASH'" class="border-b">
                                    <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                                        scope="col">
                                        Контактное лицо
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline"
                                        v-text="balance_request.contact"
                                    ></td>
                                </tr>
                                <tr v-if="balance_request.type === 'CASH'" class="border-b">
                                    <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                                        scope="col">
                                        Номер телефона
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline"
                                        v-text="balance_request.phone"
                                    ></td>
                                </tr>
                                <tr v-if="balance_request.type === 'CASHLESS' ||
                                 balance_request.type === 'USDT'"
                                    class="border-b">
                                    <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                                        scope="col">
                                        Информация о переводе
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline"
                                        v-text="balance_request.info"
                                    ></td>
                                </tr>
                                <tr v-if="balance_request.type === 'USDT'"
                                    class="border-b">
                                    <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                                        scope="col">
                                        USDT Тип
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline"
                                        v-text="balance_request.usdt_type"
                                    ></td>
                                </tr>
                                <tr v-if="balance_request.type === 'CASHLESS' && balance_request.withdraw"
                                    class="border-b">
                                    <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                                        scope="col">
                                        Расчетный счёт/номер карты
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline"
                                        v-text="balance_request.withdraw_account_number"
                                    ></td>
                                </tr>
                                <tr v-if="balance_request.type === 'USDT' && balance_request.withdraw"
                                    class="border-b">
                                    <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                                        scope="col">
                                        Номер кошелька
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline"
                                        v-text="balance_request.withdraw_wallet_number"
                                    ></td>
                                </tr>
                                <tr v-if="balance_request.type === 'SWIFT' || balance_request.type === 'SEPA'"
                                    class="border-b">
                                    <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                                        scope="col">
                                        Реквизит Файл
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline"
                                    >
                                        <a
                                            v-if="balance_request.invoice_file"
                                            :href="'/storage/'+balance_request.invoice_file"
                                            class="rounded-lg bg-gray-200 px-4 py-1"
                                            target="_blank">
                                            Открыть Файл
                                        </a>
                                    </td>
                                </tr>
                                <tr
                                    class="border-b">
                                    <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                                        scope="col">
                                        Действие
                                    </th>
                                    <td
                                        v-if="balance_request.status === 'HOLD' || balance_request.status === 'WAITING'|| balance_request.status === 'VERIFICATION'"
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline"
                                    >
                                        <button class="btn-success" @click="handleButton">
                                            <i class="fa fa-check text-white"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</template>

<style lang="scss" scoped>
.modal {
    @apply fixed top-0 w-1/3 bg-white px-4 py-6 rounded-xl z-20;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
