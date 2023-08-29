<script setup>

import {ref} from "vue";
import {router} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */});
const active = ref(false)
const show = ref(null)

const props = defineProps({
  credit_card_transactions_requisite: Object,
})

const handleButton = (id) => {
  router.post(`/transactions/${id}/status`, {
    status: 'SUCCESS'
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
                Файл Инвойса
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4" scope="col">
                Действие
              </th>
            </tr>
            </thead>
            <tbody v-for="credit_card_transaction in credit_card_transactions_requisite">
            <tr
                v-if="credit_card_transaction.status !== 'SUCCESS'"
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
              >
                <a
                    :href="'/storage/'+credit_card_transaction.invoice_file"
                    class="rounded-lg bg-gray-200 px-4 py-1"
                    target="_blank">
                  Открыть Файл
                </a>
              </td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
              >
                <div class="flex flex-col justify-around">
                  <button
                      v-if="$page.props.is_manager"
                      class="mt-1 btn-success mx-auto w-1/2"
                      type="button"
                      @click="()=>handleButton(credit_card_transaction.id)"
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
