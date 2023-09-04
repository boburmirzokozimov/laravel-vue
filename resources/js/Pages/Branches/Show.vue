<script setup>
import {Head} from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";

const props = defineProps({
    branch: Object,
})

</script>

<template>
    <Head>
        <title>Show Branch</title>
    </Head>

    <div class=" z-10">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="mb-6">{{ branch.name }}</h1>
            </div>
            <div>
                <NavLink
                    as="button"
                    class="btn-success"
                    href='/branches'>
                    <i class="fa fa-backward text-white"></i>
                </NavLink>
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
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right bg-white"
                                    v-text="branch.id"
                                ></td>
                            </tr>
                            <tr class="border-b">
                                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    scope="col">
                                    Country
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right  bg-white"
                                    v-text="branch.country.name"
                                ></td>
                            </tr>
                            <tr class="border-b">
                                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    scope="col">
                                    Name
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right  bg-white"
                                    v-text="branch.name"
                                ></td>
                            </tr>
                            <tr class="border-b">
                                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    scope="col">
                                    Address
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right  bg-white"
                                    v-text="branch.address"
                                ></td>
                            </tr>
                            <tr class="border-b">
                                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    scope="col">
                                    Full Address
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right  bg-white"
                                    v-text="branch.full_address"
                                ></td>
                            </tr>
                            <tr class="border-b">
                                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    scope="col">
                                    Latitude
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right  bg-white"
                                    v-text="branch.lat"
                                ></td>
                            </tr>
                            <tr class="border-b">
                                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    scope="col">
                                    Longitude
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right  bg-white"
                                    v-text="branch.lon"
                                ></td>
                            </tr>
                            <tr class="border-b">
                                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    scope="col">
                                    Contact Number
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right  bg-white"
                                    v-text="branch.contact_number"
                                ></td>
                            </tr>
                            <tr class="border-b">
                                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    scope="col">
                                    Contact Email
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right  bg-white "
                                    v-text="branch.contact_email"
                                ></td>
                            </tr>
                            <tr class="border-b">
                                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                                    scope="col">
                                    Start Hour
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right  bg-white underline"
                                    v-text="branch.start_hour"
                                ></td>
                            </tr>
                            <tr class="border-b">
                                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                                    scope="col">
                                    End Hour
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right  bg-white underline"
                                    v-text="branch.end_hour"
                                ></td>
                            </tr>
                            <tr class="border-b">
                                <th class="w-1/5 bg-gray-200 text-sm font-medium text-gray-900 px-6 py-4 text-left "
                                    scope="col">
                                    Photo
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right  bg-white underline flex items-center justify-end"
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
