<script setup>
const props = defineProps({
  balance: Object
})
</script>

<template>
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
