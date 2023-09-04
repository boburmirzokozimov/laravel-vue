<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const props = defineProps({
    client: Object,
    countries: Object,
})

const form = useForm({
    type: "CASH",
    currency: "USD",
    sum: "",
    client_id: props.client.id,
    withdraw: false,
    info: '',
})

const handleSubmit = () => {
    form.post('/clients/' + props.client.id + '/manage-balance', {
        onSuccess: () => {
            toaster.success('Successfully created')
        },
    })
}
</script>

<template>
    <Head>
        <title>Создать Заявку</title>
    </Head>

    <div class="">
        <h1 class="mb-6">Создать Заявку</h1>

        <form class="max-w-2xl mx-auto" method="post" @submit.prevent="handleSubmit">
            <div class="mb-6">
                <button
                    :class="form.withdraw ? 'text-gray-700':'bg-green-600 text-white'" class="w-1/2 p-4 rounded-md"
                    type="button"
                    @click="form.withdraw = false"
                >
                    Пополнение Баланса
                </button>
                <button :class="form.withdraw ? 'bg-green-600 text-white':'text-gray-700'" class="w-1/2 p-4 rounded-md"
                        type="button"
                        @click="form.withdraw = true">
                    Списание баланса
                </button>
            </div>

            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="currency"
                >
                    Валюта
                </label>
                <select
                    id="currency"
                    v-model="form.currency"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="currency"
                >
                    <option selected value="USD">USD</option>
                    <option selected value="EUR">EUR</option>
                </select>
                <div v-if="form.errors.currency" class="text-red-500 text-sm">{{ form.errors.currency }}</div>
            </div>


            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="sum"
                >
                    Сумма
                </label>

                <input
                    id="sum"
                    v-model="form.sum"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="sum"
                    type="number"
                />
                <div v-if="form.errors.sum" class="text-red-500 text-sm">{{ form.errors.sum }}</div>
            </div>

            <div
                v-if="form.type === 'CASHLESS' && form.withdraw === true" class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="withdraw_account_number"
                >
                    Расчетный счёт/номер карты
                </label>

                <input
                    id="withdraw_account_number"
                    v-model="form.withdraw_account_number"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="withdraw_account_number"
                    type="number"
                />
                <div v-if="form.errors.withdraw_account_number" class="text-red-500 text-sm">{{
                        form.errors.withdraw_account_number
                    }}
                </div>
            </div>

            <div
                v-if="form.type === 'USDT' && form.withdraw === true" class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="withdraw_account_number"
                >
                    Номер кошелька
                </label>

                <input
                    id="withdraw_wallet_number"
                    v-model="form.withdraw_wallet_number"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="withdraw_wallet_number"
                    type="number"
                />
                <div v-if="form.errors.withdraw_wallet_number" class="text-red-500 text-sm">{{
                        form.errors.withdraw_wallet_number
                    }}
                </div>
            </div>

            <div v-if="form.type === 'USDT'" class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="usdt_type"
                >
                    USDT Тип
                </label>

                <input
                    id="usdt_type"
                    v-model="form.usdt_type"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="usdt_type"
                    type="text"
                />
                <div v-if="form.errors.usdt_type" class="text-red-500 text-sm">{{ form.errors.usdt_type }}</div>
            </div>


            <div v-else class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="info"
                >
                    Информация о переводе
                </label>

                <textarea
                    id="info"
                    v-model="form.info"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    cols="15"
                    name="info"
                />
                <div v-if="form.errors.info" class="text-red-500 text-sm">{{ form.errors.info }}</div>
            </div>

            <div class="flex justify-end w-full">
                <button :disabled="form.processing" class="bg-blue-500 p-2 rounded-2xl text-white" type="submit">Создать
                </button>
            </div>
            <!--            Some fields that can be added-->
            <!--      <div class="mb-6">-->
            <!--        <label-->
            <!--            class="block mb-2 uppercase font-bold text-sm text-gray-700"-->
            <!--            for="type"-->
            <!--        >-->
            <!--          Тип-->
            <!--        </label>-->

            <!--        <select-->
            <!--            id="type"-->
            <!--            v-model="form.type"-->
            <!--            class="border border-gray-200 p-2 w-full rounded-2xl"-->
            <!--            name="type"-->
            <!--        >-->
            <!--          <option value="CASH">Наличные</option>-->
            <!--          <option value="CASHLESS">Безналичные</option>-->
            <!--          <option value="USDT">USDT</option>-->
            <!--        </select>-->
            <!--        <div v-if="form.errors.type" class="text-red-500 text-sm">{{ form.errors.type }}</div>-->
            <!--      </div>-->

            <!--            <div v-if="form.type === 'CASH'" class="mb-6">-->
            <!--                <label-->
            <!--                    class="block mb-2 uppercase font-bold text-sm text-gray-700"-->
            <!--                    for="country"-->
            <!--                >-->
            <!--                    Страна-->
            <!--                </label>-->
            <!--                <select id="country" v-model="form.country_id" class="border border-gray-200 p-2 w-full rounded-2xl"-->
            <!--                        name="country"-->
            <!--                >-->
            <!--                    <option v-for="country in props.countries" :value="country.id" v-text="country.name"></option>-->
            <!--                </select>-->
            <!--                <div v-if="form.errors.country_id" class="text-red-500 text-sm">{{ form.errors.country }}</div>-->
            <!--            </div>-->

            <!--            <div v-if="form.type === 'CASH'" class="mb-6">-->
            <!--                <label-->
            <!--                    class="block mb-2 uppercase font-bold text-sm text-gray-700"-->
            <!--                    for="contact"-->
            <!--                >-->
            <!--                    Контактное лицо-->
            <!--                </label>-->

            <!--                <input-->
            <!--                    id="contact"-->
            <!--                    v-model="form.contact"-->
            <!--                    class="border border-gray-200 p-2 w-full rounded-2xl"-->
            <!--                    name="contact"-->
            <!--                    type="text"-->
            <!--                />-->
            <!--                <div v-if="form.errors.contact" class="text-red-500 text-sm">{{ form.errors.contact }}</div>-->
            <!--            </div>-->
            <!--            <div v-if="form.type === 'CASH'" class="mb-6">-->
            <!--                <label-->
            <!--                    class="block mb-2 uppercase font-bold text-sm text-gray-700"-->
            <!--                    for="phone"-->
            <!--                >-->
            <!--                    Номер телефона-->
            <!--                </label>-->

            <!--                <input-->
            <!--                    id="phone"-->
            <!--                    v-model="form.phone"-->
            <!--                    v-maska-->
            <!--                    class="border border-gray-200 p-2 w-full rounded-2xl"-->
            <!--                    data-maska="+998 (##) ###-##-##"-->
            <!--                    name="phone"-->
            <!--                    type="text"-->
            <!--                />-->
            <!--                <div v-if="form.errors.phone" class="text-red-500 text-sm">{{ form.errors.phone }}</div>-->
            <!--            </div>-->
        </form>
    </div>

</template>

<style scoped>

</style>
