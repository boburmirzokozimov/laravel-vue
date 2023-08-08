<script setup>
import {Head} from "@inertiajs/vue3";
import InfoTable from "@/Pages/Clients/ShowTable.vue";
import NavLink from "@/Components/NavLink.vue";
import CreditCardTable from "@/Pages/Clients/CreditCard/CreditCardTable.vue";
import CreditCardRequestTable from "@/Pages/Clients/CreditCard/Request/CreditCardRequestTable.vue";
import CreditCardRequestTableAnonymous from "@/Pages/Clients/CreditCard/Request/CreditCardRequestTableAnonymous.vue";
import BalanceRequestTable from "@/Pages/Clients/BalanceRequest/BalanceRequestTable.vue";

const props = defineProps({
    client: Object,
    balance_request: Object,
    credit_card_requests: Object,
    credit_card_requests_anonymous: Object,
    credit_cards: Object,
})
</script>

<template>
    <Head>
        <title>{{ props.client.full_name }}</title>
    </Head>

    <div class="">
        <div>
            <div class="flex justify-between">
                <h1 class="mb-6">{{ props.client.full_name }}</h1>
                <div class="flex items-center">
                    <NavLink class="btn-success " href="/clients">Назад
                    </NavLink>
                </div>
            </div>
            <InfoTable :client="props.client"/>
        </div>

        <div>
            <div class="flex justify-start">
                <h1 class="mb-6">Выпущенные карты</h1>
            </div>
            <CreditCardTable :credit_cards="props.credit_cards"/>
        </div>

        <div>
            <div class="flex justify-between">
                <h1 class="mb-6">Таблица заявок на выпуск карты VISA</h1>
                <div class="flex items-center">
                    <NavLink :href="`/clients/${props.client.id}/manage-credit-card`" class="btn-success ">Создать VISA
                        карту
                    </NavLink>
                </div>
            </div>
            <CreditCardRequestTable :credit_card_requests="props.credit_card_requests"/>
        </div>
        <div>
            <div class="flex justify-start">
                <h1 class="mb-6">Таблица заявок на выпуск карты VISA на псевдоним</h1>
            </div>
            <CreditCardRequestTableAnonymous :credit_card_requests_anonymous="props.credit_card_requests_anonymous"/>
        </div>

        <div>
            <div class="flex justify-between">
                <h1 class="mb-6"> Таблица заявок на пополнение и списание баланса</h1>
                <div class="flex items-center">
                    <NavLink :href="`/clients/${props.client.id}/manage-balance`" class="btn-success ">Создать заявку
                    </NavLink>
                </div>
            </div>
            <BalanceRequestTable :balance_requests="props.balance_request"/>
        </div>
    </div>

</template>


<style scoped>

</style>
