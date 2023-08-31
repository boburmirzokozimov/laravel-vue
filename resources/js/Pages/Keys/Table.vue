<script setup>
import {createToaster} from "@meforma/vue-toaster";
import Edit from "@/Pages/Keys/Edit.vue";
import {ref} from "vue";
import Modal from "@/Components/Modal.vue";
import {router} from "@inertiajs/vue3";

const toaster = createToaster({ /* options */});
const props = defineProps({
  keys: Array,
})

const active = ref(false)
const show = ref(null)
const handleDelete = (id) => {
  router.delete('/keys/' + id)
  toaster.success('Successfully deleted')
}

const handleEdit = (id) => {
  show.value = id
  active.value = true
}

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
                Расчетный счет - SEPA
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Расчетный счет - SWIFT
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Кошелёк - ERC
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Кошелёк - TRC
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Action
              </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="key in keys"
                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 hover:cursor-pointer"
            >
              <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                  v-text="key.id"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
                  v-text="key.account_number_sepa"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
                  v-text="key.account_number_swift"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
                  v-text="key.wallet_number_erc"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
                  v-text="key.wallet_number_trc"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left"
              >
                <button class="btn-edit mr-2"
                        @click.prevent="()=>handleEdit(key.id)"
                >
                  <i class="fa fa-edit text-white"></i>
                </button>
                <button
                    class="btn-danger"
                    @click.prevent="()=>handleDelete(key.id)">
                  <i class="fa fa-trash text-white"></i>
                </button>
                <Modal v-if="active && key.id === show" @close="closeModal"/>
                <Edit v-if="active && key.id === show" :keyObject="key"
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
