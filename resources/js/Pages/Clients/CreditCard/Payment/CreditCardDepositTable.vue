<script setup>

import {ref} from "vue";
import {router} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});
const active = ref(false)
const show = ref(null)

const props = defineProps({
  credit_card_transactions: Object,
  transaction_statuses: Object,
})

const handleButton = (card_id, transaction_id) => {
  router.post(`/credit-cards/${card_id}/manage/${transaction_id}`, {
    _method: "patch"
  }, {
    onSuccess: () => {
      toaster.success('Процесс выполнен')
    },
    onError: (error) => {
      toaster.error(error.message)
    },
    preserveScroll: true
  })
}
const handleStatus = (event, id) => {
  router.post(`/transactions/${id}/status`, {
    status: event.target.value
  }, {
    onSuccess: () => {
      toaster.success('Статус изменён')
    },
    onError: (error) => {
      toaster.error(error.message)
    },
    preserveScroll: true
  })
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
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                #
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Дата
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Сумма
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Номер карты
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Статус
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4" scope="col">
                Действие
              </th>
            </tr>
            </thead>
            <tbody v-for="credit_card_transaction in credit_card_transactions">
            <tr
                v-if="credit_card_transaction.status !== 'SUCCESS' && credit_card_transaction.status !== 'CANCELED' "
                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 "
            >
              <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-left"
                  v-text="credit_card_transaction.id"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
                  v-text="credit_card_transaction.created_at"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
                  v-text="credit_card_transaction.sum"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
                  v-text="credit_card_transaction.card_number"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
              >
                <form>
                  <select
                      id="category"
                      class="border border-gray-200 p-2 w-full rounded-2xl"
                      name="category"
                      @change.prevent="handleStatus($event,credit_card_transaction.id)"
                  >
                    <option
                        v-for="status in props.transaction_statuses"
                        v-show="status !== 'SUCCESS'"
                        :selected="status === credit_card_transaction.status"
                        :value="status"
                        v-text="status"
                    ></option>
                  </select>
                </form>
              </td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
              >
                <div class="flex flex-col justify-around">
                  <button
                      v-if="$page.props.is_manager"
                      class="mt-1 btn-success mx-auto w-1/2"
                      type="button"
                      @click="()=>handleButton(credit_card_transaction.credit_card_id,credit_card_transaction.id)"
                  >Подтвердить
                  </button>
                </div>
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
