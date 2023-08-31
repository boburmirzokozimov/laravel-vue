<script setup>
import Modal from "@/Components/Modal.vue";
import {ref} from "vue";
import Edit from "@/Pages/Clients/Metal/Edit.vue";

const props = defineProps({
  metalTransactions: Object
})
const handleButton = (id) => {
  show.value = id
  active.value = true
}
const active = ref(false)
const show = ref(null)
const closeModal = () => {
  active.value = false
  show.value = null
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
                Тип Карты
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Количество
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Статус
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Сумма
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Вид
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-center" scope="col">
                Действие
              </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="metalTransaction in metalTransactions"
                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 "
            >
              <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-left"
                  v-text="metalTransaction.id"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
                  v-text="metalTransaction.sort"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
                  v-text="metalTransaction.quantity"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
                  v-text="metalTransaction.status"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
                  v-text="metalTransaction.sum"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
                  v-text="!metalTransaction.withdraw ? 'Купил' : 'Продал'"
              >
              </td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
              >
                <div class="flex flex-col justify-around">
                  <button
                      v-if="metalTransaction.status !== 'SUCCESS'"
                      class=" btn-edit "
                      @click="()=>handleButton(metalTransaction.id)">
                    Редактировать
                  </button>
                </div>
                <Modal v-if="active && metalTransaction.id === show"
                       @close="closeModal"/>
                <Edit
                    v-if="active && metalTransaction.id === show"
                    :metalTransaction="metalTransaction"
                    @close="closeModal"/>
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
