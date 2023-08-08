<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {vMaska} from "maska"
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});

const props = defineProps({
    card: Object,
})

const form = useForm({
    sum: 0,
    type: "SEPA",
    invoice_file: null,
    withdraw: false,
    card_number: '',
})

const handleSubmit = () => {
    form
        .transform((data) => ({
            ...data,
            card_number: form.card_number.replaceAll(' ', '')
        }))
        .post('/credit-cards/' + props.card.id + '/manage', {
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
                    Оплату по реквизитам
                </button>
            </div>

            <div v-if="!form.withdraw" class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="type"
                >
                    Тип
                </label>

                <select
                    id="type"
                    v-model="form.type"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="type"
                >
                    <option value="SEPA">SEPA
                    </option>
                    <option value="SWIFT">SWIFT</option>
                </select>
                <div v-if="form.errors.type" class="text-red-500 text-sm">{{ form.errors.type }}</div>
            </div>
            <div v-if="!form.withdraw" class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="card_number"
                >
                    Номер карты
                </label>

                <input
                    id="card_number"
                    v-model="form.card_number"
                    v-maska
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    data-maska="#### #### #### ####"
                    name="card_number"
                    placeholder="1234 5678 9123 4567"
                    type="text"
                />
                <div v-if="form.errors.card_number" class="text-red-500 text-sm">{{
                        form.errors.card_number
                    }}
                </div>
            </div>
            <div v-else class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-sm text-gray-700"
                    for="invoice_file"
                >
                    Файл Инвойса
                </label>

                <input
                    id="invoice_file"
                    class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="invoice_file"
                    type="file"
                    @input="form.invoice_file = $event.target.files[0]"
                />
                <div v-if="form.errors.sum" class="text-red-500 text-sm">{{
                        form.errors.sum
                    }}
                </div>
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
                <div v-if="form.errors.sum" class="text-red-500 text-sm">{{
                        form.errors.sum
                    }}
                </div>
            </div>
            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}%
            </progress>
            <div class="flex justify-end w-full">
                <button :disabled="form.processing" class="bg-blue-500 p-2 rounded-2xl text-white" type="submit">Создать
                </button>
            </div>
        </form>
    </div>

</template>

<style scoped>

</style>
