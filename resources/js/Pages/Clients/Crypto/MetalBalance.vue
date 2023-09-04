<script setup>
import NavLink from "@/Components/NavLink.vue";

const props = defineProps({
  balance: Object,
  client: Object
})
</script>

<template>
  <div class="mb-6">
    <div class="flex justify-between">
      <div class="flex">
        <NavLink
            :href="`/clients/${props.client.id}`"
            as="h1" class="cursor-pointer text-center">
          Main Balance/
        </NavLink>
        <NavLink
            :href="`/metal/${props.client.id}`"
            as="h1" class="cursor-pointer text-center">
          Metal Balance/
        </NavLink>
        <h1 class=" text-center text-gray-400">
          Crypto Balance
        </h1>
      </div>
      <div class="flex items-center">
        <NavLink class="btn-success " href="/clients">
          <i class="fa fa-backward text-white"></i>
        </NavLink>
      </div>
    </div>
  </div>

  <div class="flex flex-col">
    <div class="sm:mx-0.5 lg:mx-0.5">
      <div class="py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <tbody class="">
            <tr class="border-b border-t">
              <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                  scope="col">
                #
              </th>
              <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                  v-text="balance.id"
              ></td>
            </tr>
            <tr class="border-b">
              <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                  scope="col">
                Card Type
              </th>
              <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                  v-text="balance.card_type"
              ></td>
            </tr>
            <tr class="border-b">
              <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                  scope="col">
                Balance
              </th>
              <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                  v-text="balance.balance ?? 0"
              ></td>
            </tr>
            <tr class="border-b">
              <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                  scope="col">
                Owner
              </th>
              <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                  v-text="balance?.client?.full_name"
              ></td>
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
