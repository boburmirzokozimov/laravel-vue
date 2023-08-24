<script setup>
import {ref, watch} from "vue";
import {debounce} from "lodash";
import {router, useForm} from "@inertiajs/vue3";

const props = defineProps({
    filters: Object,
    roles: Object,
    countries: Object
})

const filter = useForm({
    full_name: props.filters.full_name,
    phone: props.filters.phone,
    role: props.filters.role,
    country: props.filters.country
})

watch(filter, debounce(function (filter) {
    router.get(
        '/users', {
            full_name: filter.full_name,
            phone: filter.phone,
            role: filter.role,
            country: filter.country,
        }, {
            preserveState: true,
            replace: true,
        }
    )
}, 500))

</script>

<template>
    <div class="flex">
        <div class="w-1/4 mr-2">
            <input
                id="search"
                v-model="filter.full_name"
                class="border border-gray-200 p-2 w-full rounded-2xl"
                name="search"
                placeholder="Name..."
                type="search">
        </div>
        <div class="w-1/4 mr-2">
            <input
                id="search"
                v-model="filter.phone"
                class="border border-gray-200 p-2 w-full rounded-2xl"
                name="search"
                placeholder="Phone..."
                type="search">
        </div>
        <div class="w-1/4 mr-2">
            <select id="category" v-model="filter.role" class="h-full border border-gray-200 p-2 w-full rounded-2xl"
                    name="category"
                    required>
                <option value=""></option>
                <option v-for="role in props.roles" :value="role.id" v-text="role.name.toUpperCase()"></option>
            </select>
        </div>
        <div class="w-1/4 ">
            <select id="country" v-model="filter.country" class="h-full border border-gray-200 p-2 w-full rounded-2xl"
                    name="country"
                    required>
                <option value=""></option>
                <option v-for="country in props.countries"
                        :value="country.name"
                        v-text="country.name"></option>
            </select>
        </div>
    </div>
</template>

<style scoped>

</style>
