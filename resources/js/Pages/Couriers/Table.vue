<script setup>
import {router} from "@inertiajs/vue3";
import {createToaster} from "@meforma/vue-toaster";
import {ref} from "vue";
import Modal from "@/Components/Modal.vue";
import Edit from "@/Pages/Couriers/Edit.vue";

const toaster = createToaster({ /* options */});
const props = defineProps({
  couriers: Object,
  countries: Object,
})

const active = ref(false)
const show = ref(null)
const handleDelete = (id) => {
  router.delete('/couriers/' + id)
  toaster.success('Successfully deleted')
}

const handleEdit = (id) => {
  show.value = 'edit' + id
  active.value = true
}

const handleStatus = (courier) => {
  router.post('/couriers/' + courier.id + '/status', {
        status: courier.status === 'active' || courier.status === 'inactive' ? 'blocked' : 'active'
      }, {
        onSuccess: () => {
          toaster.success('Successfully edited')
        },
        preserveScroll: true
      }
  )
}

const closeModal = () => {
  active.value = false
  show.value = null
}

const getStatus = (status) => {
  if (status === 'active') {
    return 'Активный'
  } else if (status === 'inactive') {
    return 'Неактивный'
  } else {
    return 'Блокированный'
  }
}
const getStatusClass = (status) => {
  if (status === 'active') {
    return 'btn-success'
  } else if (status === 'inactive') {
    return 'btn-secondary'
  } else {
    return 'btn-danger'
  }
}

</script>

<template>
  <div class="flex flex-col">
    <div class="">
      <div class="py-2 inline-block mx-auto w-full">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="bg-gray-200 border-b">
            <tr>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                #
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                ФИО
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Дата последнего входа
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Номер телефона
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Страна
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Статус
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Блокировать
              </th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left" scope="col">
                Дейтсвие
              </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="courier in props.couriers"
                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 text-left">
              <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                  v-text="courier.id"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                  v-text="courier.fullName"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                  v-text="courier.lastSeen"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                  v-text="courier.phone"
              ></td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                  v-text="`${courier?.country?.slice(0,20)}...`"
              ></td>
              <td

                  class="text-sm text-gray-900 font-light py-4 whitespace-nowrap text-center "

              >
                <button
                    :class="getStatusClass(courier.status)"
                    type="button"
                    v-text="getStatus(courier.status)"
                >

                </button>
              </td>
              <td
                  class="text-sm text-gray-900 font-light py-4 whitespace-nowrap text-center"
              >
                <button
                    :class="courier.status === 'blocked' ? 'btn-success' : 'btn-danger'"
                    class=" mx-auto"
                    @click="()=>handleStatus(courier)"
                >
                  {{ courier.status === 'blocked' ? 'Разблокировать' : 'Блокировать' }}
                </button>
              </td>
              <td
                  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
              >
                <button class="btn-edit mr-2"
                        @click.prevent="()=>handleEdit(courier.id)"
                >
                  <i class="fa fa-edit text-white"></i>
                </button>
                <button class="btn-danger"
                        @click.prevent="()=>handleDelete(courier.id)">
                  <i class="fa fa-trash text-white"></i>
                </button>
                <Modal v-if="active && 'edit' +courier.id === show" @close="closeModal"/>
                <Edit v-if="active && 'edit' +courier.id === show" :countries="props.countries"
                      :courier="courier"
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
