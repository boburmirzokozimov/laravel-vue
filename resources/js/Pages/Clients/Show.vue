<script setup>
import {Head} from "@inertiajs/vue3";
import InfoTable from "@/Pages/Clients/ShowTable.vue";
import NavLink from "@/Components/NavLink.vue";
import CreditCardTable from "@/Pages/Clients/CreditCard/CreditCardTable.vue";
import CreditCardRequestTable from "@/Pages/Clients/CreditCard/Request/CreditCardRequestTable.vue";
import CreditCardRequestTableAnonymous from "@/Pages/Clients/CreditCard/Request/CreditCardRequestTableAnonymous.vue";
import BalanceRequestTable from "@/Pages/Clients/BalanceRequest/BalanceRequestTable.vue";
import CreditCardDepositTable from "@/Pages/Clients/CreditCard/Payment/CreditCardDepositTable.vue";
import CreditCardWithdrawTable from "@/Pages/Clients/CreditCard/Payment/CreditCardWithdrawTable.vue";
import CreditCardTransactionsHistoryTable
  from "@/Pages/Clients/CreditCard/Payment/CreditCardTransactionsHistoryTable.vue";
import {ref} from "vue";

const props = defineProps({
  client: Object,
  balance_request: Object,
  credit_card_requests: Object,
  credit_card_requests_anonymous: Object,
  credit_cards: Object,
  credit_card_transactions: Object,
  credit_card_transactions_requisite: Object,
  transaction_statuses: Object,
  balance_transaction_history: Object
})
const data = ref([
  {
    name: "CARDS",
  },
  {
    name: "BALANCE",
  },
  {
    name: "HISTORY",
  },
])
const dataCards = ref([
  {
    name: "Cards",
  },
  {
    name: "Requests",
  },
])
const show = ref('CARDS')
const innerShow = ref('')

</script>

<template>
  <Head>
    <title>{{ props.client.full_name }}</title>
  </Head>

  <div class="">
    <div class="mb-6">
      <div class="flex justify-between">
        <h1 class="mb-6 items-center">{{ props.client.full_name }}</h1>
        <div class="flex items-center">
          <NavLink class="btn-success " href="/clients">
            <i class="fa fa-backward text-white"></i>
          </NavLink>
        </div>
      </div>
      <InfoTable :client="props.client"/>
    </div>

    <div>
      <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
        <li
            v-for="route in data"
            :class="show === route.name && 'bg-white'"
            aria-current="page"
            class="cursor-pointer inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500"
            @click="show = route.name"
            v-text="route.name">
        </li>
      </ul>
    </div>
    <div v-show="show ==='CARDS'">
      <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
        <li
            v-for="route in dataCards"
            :class="innerShow === route.name && 'bg-white'"
            aria-current="page"
            class="cursor-pointer inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500"
            @click="innerShow = route.name"
            v-text="route.name">
        </li>
      </ul>
    </div>


    <div>
      <div v-if="props.credit_cards.length && innerShow === 'Cards'" class="mb-6">
        <div class="flex justify-start">
          <h1 class="mb-6">Выпущенные карты</h1>
        </div>
        <CreditCardTable :credit_cards="props.credit_cards"/>
      </div>
      <div v-if="props.credit_card_requests.length && innerShow === 'Requests'" class="mb-6">
        <div class="flex justify-between">
          <h1 class="mb-6">Таблица заявок на выпуск карты VISA</h1>
          <div class="flex items-center">
            <NavLink :href="`/clients/${props.client.id}/manage-credit-card`" class="btn-success ">Создать
              VISA
              карту
            </NavLink>
          </div>
        </div>
        <CreditCardRequestTable :credit_card_requests="props.credit_card_requests"/>
      </div>

      <div v-if="props.credit_card_requests_anonymous.length && innerShow === 'Requests'" class="mb-6">
        <div class="flex justify-start">
          <h1 class="mb-6">Таблица заявок на выпуск карты VISA на псевдоним</h1>
        </div>
        <CreditCardRequestTableAnonymous
            :credit_card_requests_anonymous="props.credit_card_requests_anonymous"/>
      </div>

      <div v-if="props.credit_card_transactions.length && show === 'HISTORY'" class="mb-6">
        <div class="flex justify-start">
          <h1 class="mb-6">Таблица заявок на Пополнения карт VISA</h1>
        </div>
        <CreditCardDepositTable :credit_card_transactions="props.credit_card_transactions"
                                :transaction_statuses="props.transaction_statuses"/>
      </div>

      <div v-if="props.credit_card_transactions.length && show === 'HISTORY'" class="mb-6">
        <div class="flex justify-start">
          <h1 class="mb-6">Таблица заявок на Оплату по реквизитам</h1>
        </div>
        <CreditCardWithdrawTable :credit_card_transactions_requisite="props.credit_card_transactions_requisite"/>
      </div>

      <div v-if="props.balance_transaction_history.length && show === 'HISTORY'" class="mb-6">
        <div class="flex justify-start">
          <h1 class="mb-6">Таблица всех транзакций клиента
          </h1>
        </div>
        <CreditCardTransactionsHistoryTable :credit_card_transactions="props.balance_transaction_history"/>
      </div>


      <div v-if="props.balance_request && show === 'BALANCE'" class="mb-6">
        <div class="flex justify-between">
          <h1 class="mb-6"> Таблица заявок на пополнение и списание баланса</h1>
          <div class="flex items-center">
            <NavLink :href="`/clients/${props.client.id}/manage-balance`" class="btn-success ">Создать
              заявку
            </NavLink>
          </div>
        </div>
        <BalanceRequestTable :balance_requests="props.balance_request"
                             :transaction_statuses="props.transaction_statuses"/>
      </div>
    </div>

  </div>

</template>


<style scoped>

</style>
