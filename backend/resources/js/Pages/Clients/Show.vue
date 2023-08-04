<script setup>
import {Head} from "@inertiajs/vue3";
import InfoTable from "@/Pages/Clients/ShowTable.vue";
import BalanceRequestTable from "@/Pages/Clients/BalanceRequest/BalanceRequestTable.vue";
import NavLink from "@/Components/NavLink.vue";

const props = defineProps({
    client: Object,
    balance_request: Object
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
            <h1 class="mb-6">Карты VISA</h1>
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
