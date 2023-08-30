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
                  Country
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                    v-text="branch.country.name"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    scope="col">
                  Name
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                    v-text="branch.name"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    scope="col">
                  Address
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                    v-text="branch.address"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    scope="col">
                  Full Address
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                    v-text="branch.full_address"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    scope="col">
                  Latitude
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                    v-text="branch.lat"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    scope="col">
                  Longitude
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                    v-text="branch.lon"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    scope="col">
                  Contact Number
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"
                    v-text="branch.contact_number"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    scope="col">
                  Contact Email
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right "
                    v-text="branch.contact_email"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                    scope="col">
                  Start Hour
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline"
                    v-text="branch.start_hour"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                    scope="col">
                  End Hour
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline"
                    v-text="branch.end_hour"
                ></td>
              </tr>
              <tr class="border-b">
                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                    scope="col">
                  Photo
                </th>
                <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right underline flex justify-end"
                >
                  <img :src="`/storage/${branch.photo}`" alt="photo" class="w-20 h-20"/>
                </td>
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
