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
import Paginator from "@/Components/Paginator.vue";
import Filter from "@/Pages/Clients/CreditCard/Payment/Filter.vue";

const props = defineProps({
  client: Object,
  balance_request: Object,
  credit_card_requests: Object,
  credit_card_requests_anonymous: Object,
  credit_cards: Object,
  credit_card_transactions: Object,
  credit_card_transactions_requisite: Object,
  transaction_statuses: Object,
  balance_transaction_history: Object,
  filters: Object
})
const data = ref([
  {
    name: "CARDS",
  },
  {
    name: "BALANCE",
  },
  {
    name: "Transactions History",
  },
])
const dataCards = ref([
  {
    name: "Cards",
  },
  {
    name: "Replenishment",
  },
  {
    name: "Requests",
  },
  {
    name: "Anonymous Requests",
  },
])
const dataBalance = ref([
  {
    name: "Balance Transaction Requests",
  },
  {
    name: "Requisite",
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

    <!--        Info Table About the user-->
    <div class="mb-6">
      <div class="flex justify-between">
        <div class="flex">
          <h1 class="mb-6 items-center text-gray-400">Main Balance</h1>
          <NavLink
              :href="`/metal/${props.client.id}`"
              as="h1" class="cursor-pointer text-center">
            /Metal Balance/
          </NavLink>
          <NavLink
              :href="`/crypto/${props.client.id}`"
              as="h1" class="cursor-pointer text-center">
            Crypto Balance
          </NavLink>
        </div>
        <div class="flex items-center">
          <NavLink class="btn-success " href="/clients">
            <i class="fa fa-backward text-white"></i>
          </NavLink>
        </div>
      </div>
      <InfoTable :client="props.client"/>
    </div>
    <!--        Tabs-->
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
    <!--        Inner Tabs-->
    <div class="inner-tabs">
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
      <div v-show="show ==='BALANCE'">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
          <li
              v-for="route in dataBalance"
              :class="innerShow === route.name && 'bg-white'"
              aria-current="page"
              class="cursor-pointer inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500"
              @click="innerShow = route.name"
              v-text="route.name">
          </li>
        </ul>
      </div>
    </div>

    <!--        Cards Table-->
    <div
        v-if="show ==='CARDS'"
        class="cards">
      <div v-show="props.credit_cards.length && innerShow === 'Cards'" class="mb-6">
        <div class="flex justify-start">
          <h1 class="mb-6">Выпущенные карты</h1>
        </div>
        <CreditCardTable :credit_cards="props.credit_cards"/>
      </div>
      <div v-show="innerShow === 'Requests'" class="mb-6">
        <div class="flex justify-between">
          <h1 class="mb-6">Таблица заявок на выпуск карты VISA</h1>
          <div class="flex items-center">
            <NavLink :href="`/clients/${props.client.id}/manage-credit-card`" class="btn-success ">
              <i class="fa fa-plus text-white"></i>
            </NavLink>
          </div>
        </div>
        <CreditCardRequestTable :credit_card_requests="props.credit_card_requests"/>
      </div>

      <div v-show="props.credit_card_requests_anonymous.length && innerShow === 'Anonymous Requests'"
           class="mb-6">
        <div class="flex justify-start">
          <h1 class="mb-6">Таблица заявок на выпуск карты VISA на псевдоним</h1>
        </div>
        <CreditCardRequestTableAnonymous
            :credit_card_requests_anonymous="props.credit_card_requests_anonymous"/>
      </div>

      <div v-if="props.credit_card_transactions.length && innerShow === 'Replenishment'" class="mb-6">
        <div class="flex justify-start">
          <h1 class="mb-6">Таблица заявок на Пополнения карт VISA</h1>
        </div>
        <CreditCardDepositTable :credit_card_transactions="props.credit_card_transactions"
                                :transaction_statuses="props.transaction_statuses"/>
      </div>
    </div>

    <!--        Balance Table-->
    <div
        v-if="show ==='BALANCE'"
        class="balance">
      <div v-if="props.balance_request && innerShow === 'Balance Transaction Requests'" class="mb-6">
        <div class="flex justify-between">
          <h1 class="mb-6"> Таблица заявок на пополнение и списание баланса</h1>
          <div class="flex items-center">
            <NavLink :href="`/clients/${props.client.id}/manage-balance`" class="btn-success ">
              <i class="fa fa-plus text-white"></i>
            </NavLink>
          </div>
        </div>
        <BalanceRequestTable :balance_requests="props.balance_request"
                             :transaction_statuses="props.transaction_statuses"/>
      </div>

      <div v-if="props.credit_card_transactions.length && innerShow === 'Requisite'" class="mb-6">
        <div class="flex justify-start">
          <h1 class="mb-6">Таблица заявок на Оплату по реквизитам</h1>
        </div>
        <CreditCardWithdrawTable
            :credit_card_transactions_requisite="props.credit_card_transactions_requisite"/>
      </div>
    </div>

    <!--        History Table-->
    <div
        v-if="show ==='Transactions History'"
        class="history"
    >
      <!--            At first I thought it would be a good idea to show them separately,in case you need it I am jus commenting them -->
      <!--            <div v-if="props.credit_card_transactions.length && innerShow === 'Replenish'" class="mb-6">-->
      <!--                <div class="flex justify-start">-->
      <!--                    <h1 class="mb-6">Таблица заявок на Пополнения карт VISA</h1>-->
      <!--                </div>-->
      <!--                <CreditCardDepositTable :credit_card_transactions="props.credit_card_transactions"-->
      <!--                                        :transaction_statuses="props.transaction_statuses"/>-->
      <!--            </div>-->

      <!--            <div v-if="props.credit_card_transactions.length && innerShow === 'Withdraw'" class="mb-6">-->
      <!--                <div class="flex justify-start">-->
      <!--                    <h1 class="mb-6">Таблица заявок на Оплату по реквизитам</h1>-->
      <!--                </div>-->
      <!--                <CreditCardWithdrawTable-->
      <!--                    :credit_card_transactions_requisite="props.credit_card_transactions_requisite"/>-->
      <!--            </div>-->
      <Filter :client_id="props.client.id" :filters="props.filters"/>
      <div class="mb-6">
        <div class="flex justify-start">
          <h1 class="mb-6">Таблица всех транзакций клиента
          </h1>
        </div>
        <CreditCardTransactionsHistoryTable :credit_card_transactions="props.balance_transaction_history.data"/>
      </div>
      <Paginator :links="props.balance_transaction_history.links"/>
    </div>


  </div>

</template>


<style scoped>

</style>
