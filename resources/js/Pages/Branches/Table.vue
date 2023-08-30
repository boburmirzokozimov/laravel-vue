<script setup>
import {createToaster} from "@meforma/vue-toaster";
import Edit from "@/Pages/Branches/Edit.vue";
import {ref} from "vue";
import Modal from "@/Components/Modal.vue";
import {router} from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";

const toaster = createToaster({ /* options */});
const props = defineProps({
  branches: Array,
})

const active = ref(false)
const show = ref(null)
const handleDelete = (id) => {
  router.delete('/branches/' + id)
  toaster.success('Successfully deleted')
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
                Address
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Full Address
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Latitude
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Longitude
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Contact Number
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Contact Email
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-center" scope="col">
                Action
              </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="branch in branches"
                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 hover:cursor-pointer"
            >
              <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                  v-text="branch.id"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                  v-text="branch.address"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
              >
                {{ branch.full_address.slice(0, 20) }}...
              </td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                  v-text="branch.lat"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                  v-text="branch.lon"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                  v-text="branch.contact_number"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                  v-text="branch.contact_email"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
              >
                <NavLink :href="`/branches/${branch.id}`"
                         class="btn-success mr-2"
                >
                  <i class="fa fa-eye text-white"></i>
                </NavLink>
                <NavLink :href="`/branches/${branch.id}/edit`"
                         class="btn-edit mr-2"
                >
                  <i class="fa fa-edit text-white"></i>
                </NavLink>
                <button
                    class="btn-danger"
                    @click.prevent="()=>handleDelete(branch.id)">
                  <i class="fa fa-trash text-white"></i>
                </button>
                <Modal v-if="active && branch.id === show" @close="closeModal"/>
                <Edit v-if="active && branch.id === show" :branch="branch"
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
