<script setup>
import {Head} from "@inertiajs/vue3";

const props = defineProps({
  branch: Object,
})

</script>

<template>
  <Head>
    <title>Show Branch</title>
  </Head>

  <div class=" z-10">
    <h1 class="mb-6">Show The Branch</h1>

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
                    v-text="branch.id"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    scope="col">
                  Full Name
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                    v-text="branch.address"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    scope="col">
                  Phone
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                    v-text="branch.full_address"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    scope="col">
                  Balance
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                    v-text="branch.balance"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    scope="col">
                  Auth Key
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                    v-text="branch.auth_key"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    scope="col">
                  Comments
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                    v-text="branch.comments"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    scope="col">
                  Status
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right "
                    v-text="branch.is_active"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                    scope="col">
                  Last Visited
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline"
                    v-text="branch.last_visited"
                ></td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>

</template>

<style lang="scss" scoped>
</style>
