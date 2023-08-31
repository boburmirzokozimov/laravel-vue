<script setup>
import {Head, router} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";
import Paginator from "@/Components/Paginator.vue";
import Filter from "@/Pages/Transactions/Filter.vue";

const toaster = createToaster({ /* options */});

const props = defineProps({
  balance_transactions: Object,
  transaction_statuses: Object,
  filters: Object
})
const handleStatus = (status, id) => {
  router.post(`/transactions/${id}/status`, {
    status: status
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
  <Head>
    <title>Balance Transactions</title>
  </Head>
  <Filter :filters="filters"/>
  <div class="flex flex-col">
    <div class="sm:mx-0.5 lg:mx-0.5">
      <div class="py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="bg-gray-200 border-b">
            <tr>
              <th class="text-sm font-medium text-gray-900 px-6 py-4" scope="col">
                #
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4" scope="col">
                Client
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4" scope="col">
                Sum
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4" scope="col">
                Type
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4" scope="col">
                Status
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4" scope="col">
                Action
              </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="balance_transaction in balance_transactions.data"
                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 "
            >
              <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                  v-text="balance_transaction.id"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                  v-text="balance_transaction.client.full_name"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                  v-text="balance_transaction.sum"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                  v-text="balance_transaction.type"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
              >
                <form>
                  <select
                      id="category"
                      class="text-center border border-gray-200 p-2 w-full rounded-2xl"
                      name="category"
                      @change.prevent="handleStatus($event.target.value,balance_transaction.id)"
                  >
                    <option
                        v-for="status in props.transaction_statuses"
                        v-show="status !== 'SUCCESS'"
                        :selected="status === balance_transaction.status"
                        :value="status"
                        class="text-center"
                        v-text="status"
                    ></option>
                  </select>
                </form>
              </td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
              >
                <!--                <button v-if="balance_transaction.status === 'HOLD' || balance_transaction.status === 'WAITING'"-->
                <!--                        class="btn-edit"-->
                <!--                        @click="()=>handleButton(balance_transaction.id)">Просмотр деталей-->
                <!--                </button>-->

                <!--                <button v-if="balance_transaction.status === 'HOLD' || balance_transaction.status === 'WAITING'"-->
                <!--                        class="btn-danger"-->
                <!--                        @click="handleStatus('CANCELED', balance_request.id)">Отменить-->
                <!--                </button>-->
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <Paginator :links="balance_transactions.links"/>
</template>

<style scoped>

</style>
