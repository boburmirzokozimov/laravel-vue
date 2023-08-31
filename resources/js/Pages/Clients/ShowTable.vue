<script setup>
const props = defineProps({
  client: Object,
})
</script>

<template>
  <div class="flex flex-col">
    <div class="sm:mx-0.5 lg:mx-0.5 ">
      <div class="py-2 inline-block mx-auto sm:px-6 lg:px-8 w-full">
        <div class="overflow-hidden">
          <table class="min-w-full rounded-2xl">
            <tbody class="rounded-2xl">
            <tr class="border-b border-t rounded-2xl">
              <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                  scope="col">
                #
              </th>
              <td
                  class="bg-white px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                  v-text="client.id"
              ></td>
            </tr>
            <tr class="border-b">
              <th class=" w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                  scope="col">
                Full Name
              </th>
              <td
                  class="bg-white px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                  v-text="client.full_name"
              ></td>
            </tr>
            <tr class="border-b">
              <th class=" w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                  scope="col">
                Phone
              </th>
              <td
                  class="bg-white px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                  v-text="client.phone"
              ></td>
            </tr>
            <tr class="border-b">
              <th class=" w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                  scope="col">
                Balance
              </th>
              <td
                  class="bg-white px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                  v-text="client.balance"
              ></td>
            </tr>
            <tr class="border-b">
              <th class=" w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                  scope="col">
                Auth Key
              </th>
              <td
                  class="bg-white px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                  v-text="client.auth_key"
              ></td>
            </tr>
            <tr class="border-b">
              <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                  scope="col">
                Comments
              </th>
              <td
                  class="bg-white px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                  v-text="client.comments"
              ></td>
            </tr>
            <tr class="border-b">
              <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                  scope="col">
                Status
              </th>
              <td
                  class="bg-white px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right "
                  v-text="client.is_active"
              ></td>
            </tr>
            <tr class="border-b">
              <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                  scope="col">
                Last Visited
              </th>
              <td
                  class="bg-white px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline"
                  v-text="client.last_visited"
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
